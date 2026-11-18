<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages;

use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\ConsumerRequestResource;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestType;
use JeffersonGoncalves\UsPrivacyRequests\RequestManager;

class CreateConsumerRequest extends CreateRecord
{
    protected static string $resource = ConsumerRequestResource::class;

    /**
     * Open through the manager: it sets the status, the legal deadline and fires ConsumerRequestOpened.
     *
     * @param  array<string, mixed>  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        return app(RequestManager::class)->open(RequestType::from($data['type']), null, [
            'name' => $data['requester_name'] ?? null,
            'email' => $data['requester_email'] ?? null,
            'details' => $data['details'] ?? null,
        ], $data['state'] ?? null);
    }

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}
