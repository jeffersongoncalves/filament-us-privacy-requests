<?php

use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\ConsumerRequestResource;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages\CreateConsumerRequest;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages\ListConsumerRequests;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages\ViewConsumerRequest;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Tests\Fixtures\TestUser;
use JeffersonGoncalves\Filament\UsPrivacyRequests\UsPrivacyRequestsPlugin;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestStatus;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestType;
use JeffersonGoncalves\UsPrivacyRequests\Facades\UsPrivacyRequests;
use JeffersonGoncalves\UsPrivacyRequests\Models\ConsumerRequest;
use Livewire\Livewire;

beforeEach(function () {
    $this->admin = TestUser::create(['name' => 'Admin', 'email' => 'admin@example.com']);
    $this->subject = TestUser::create(['name' => 'Maria', 'email' => 'maria@example.com']);

    $this->actingAs($this->admin);
});

function verifiedRequest(RequestType $type): ConsumerRequest
{
    return UsPrivacyRequests::verify(UsPrivacyRequests::open($type, test()->subject, state: 'VA'), test()->subject);
}

it('opens a request with the deadline of the consumer\'s state', function () {
    $this->freezeSecond();

    Livewire::test(CreateConsumerRequest::class)
        ->fillForm(['type' => 'access', 'state' => 'IA', 'requester_name' => 'Maria', 'requester_email' => 'maria@example.com'])
        ->call('create')
        ->assertHasNoFormErrors();

    $request = ConsumerRequest::sole();

    expect($request->type)->toBe(RequestType::Access)
        ->and($request->state)->toBe('IA')
        ->and($request->status)->toBe(RequestStatus::Pending)
        ->and($request->due_at->equalTo(now()->addDays(90)))->toBeTrue();
});

it('lists requests and filters the overdue ones', function () {
    $overdue = UsPrivacyRequests::open(RequestType::Access);
    $this->travel(46)->days();
    $onTime = UsPrivacyRequests::open(RequestType::Delete);

    Livewire::test(ListConsumerRequests::class)
        ->assertCanSeeTableRecords([$overdue, $onTime])
        ->filterTable('overdue')
        ->assertCanSeeTableRecords([$overdue])
        ->assertCanNotSeeTableRecords([$onTime]);

    expect(ConsumerRequestResource::getNavigationBadge())->toBe('2')
        ->and(ConsumerRequestResource::getNavigationBadgeColor())->toBe('danger');
});

it('verifies the requester and links the consumer', function () {
    $request = UsPrivacyRequests::open(RequestType::Access);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => $this->subject->getKey()])
        ->assertHasNoActionErrors();

    $request->refresh();

    expect($request->isVerified())->toBeTrue()
        ->and($request->subject?->is($this->subject))->toBeTrue();
});

it('does not verify against an unknown record', function () {
    $request = UsPrivacyRequests::open(RequestType::Access);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('verify', ['subject_type' => TestUser::class, 'subject_id' => 999]);

    expect($request->fresh()->isVerified())->toBeFalse();
});

it('fulfils an access request and offers the export', function () {
    Storage::fake('local');
    $request = verifiedRequest(RequestType::Access);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil')
        ->assertActionVisible('download')
        ->callAction('download')
        ->assertFileDownloaded("request-{$request->getKey()}.json");

    expect($request->fresh()->status)->toBe(RequestStatus::Completed);
    Storage::disk('local')->assertExists("us-privacy/requests/request-{$request->getKey()}.json");
});

it('deletes the consumer on a delete request', function () {
    $request = verifiedRequest(RequestType::Delete);

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('fulfil');

    expect($this->subject->fresh()->name)->toBe('M****')
        ->and($request->fresh()->status)->toBe(RequestStatus::Completed);
});

it('completes manual rights with a response and rejects with a reason', function () {
    $manual = UsPrivacyRequests::open(RequestType::Correct);
    $rejected = UsPrivacyRequests::open(RequestType::Access);

    Livewire::test(ViewConsumerRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('complete', ['response' => 'Address fixed.']);

    Livewire::test(ViewConsumerRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => ''])
        ->assertHasActionErrors(['reason' => 'required']);

    Livewire::test(ViewConsumerRequest::class, ['record' => $rejected->getKey()])
        ->callAction('reject', ['reason' => 'Identity not confirmed.']);

    expect($manual->fresh())->status->toBe(RequestStatus::Completed)->response->toBe('Address fixed.')
        ->and($rejected->fresh())->status->toBe(RequestStatus::Rejected)->response->toBe('Identity not confirmed.');

    Livewire::test(ViewConsumerRequest::class, ['record' => $manual->getKey()])
        ->assertActionHidden('verify')
        ->assertActionHidden('complete')
        ->assertActionHidden('reject');
});

it('extends the deadline once by 45 days', function () {
    $this->freezeSecond();
    $request = UsPrivacyRequests::open(RequestType::Access, state: 'CO');
    $due = $request->due_at->copy();

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('extend', ['reason' => 'Records spread over several systems.']);

    expect($request->fresh()->due_at->equalTo($due->addDays(45)))->toBeTrue();

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('extend');
});

it('records an appeal and decides it within the state window', function () {
    $this->freezeSecond();
    $request = UsPrivacyRequests::reject(UsPrivacyRequests::open(RequestType::Delete, $this->subject, state: 'CO'), 'Could not verify.');

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('reject')
        ->callAction('appeal', ['reason' => 'I sent my ID.']);

    expect($request->fresh())
        ->status->toBe(RequestStatus::Appealed)
        ->appeal_due_at->toDateString()->toBe(now()->addDays(45)->toDateString());

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('fulfil')
        ->callAction('extend_appeal', ['reason' => 'Complex.'])
        ->callAction('decide_appeal', ['decision' => 'denied', 'response' => 'Still not verified. Contact the Colorado Attorney General.']);

    expect($request->fresh())
        ->status->toBe(RequestStatus::Rejected)
        ->appeal_result->toBe('denied')
        ->appeal_due_at->toDateString()->toBe(now()->addDays(105)->toDateString());

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->assertActionHidden('appeal');
});

it('reopens the request on a granted appeal and has no appeal in Utah', function () {
    $request = UsPrivacyRequests::reject(UsPrivacyRequests::open(RequestType::Delete, $this->subject, state: 'VA'), 'No.');
    $utah = UsPrivacyRequests::reject(UsPrivacyRequests::open(RequestType::Delete, $this->subject, state: 'UT'), 'No.');

    Livewire::test(ViewConsumerRequest::class, ['record' => $request->getKey()])
        ->callAction('appeal')
        ->assertActionHidden('extend_appeal')
        ->callAction('decide_appeal', ['decision' => 'granted', 'response' => 'We will delete it.']);

    expect($request->fresh()->status)->toBe(RequestStatus::Pending);

    Livewire::test(ViewConsumerRequest::class, ['record' => $utah->getKey()])
        ->assertActionHidden('appeal');
});

it('offers the same actions on the table rows', function () {
    $request = UsPrivacyRequests::open(RequestType::Access);

    Livewire::test(ListConsumerRequests::class)
        ->assertTableActionHidden('fulfil', $request)
        ->callTableAction('reject', $request, ['reason' => 'Duplicate.']);

    expect($request->fresh()->status)->toBe(RequestStatus::Rejected);
});

it('registers the resource with the fluent plugin options', function () {
    $plugin = UsPrivacyRequestsPlugin::get()->navigationGroup('US')->slug('privacy-requests')->subjectModels([TestUser::class]);

    expect(ConsumerRequestResource::getNavigationGroup())->toBe('US')
        ->and(ConsumerRequestResource::getSlug())->toBe('privacy-requests')
        ->and($plugin->getSubjectModels())->toBe([TestUser::class])
        ->and(__('filament-us-privacy-requests::filament-us-privacy-requests.resource.plural_label'))->toBe('Consumer requests');
});
