<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Actions;

use Filament\Actions\Action;
use Filament\Actions\MountableAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action as TableAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use JeffersonGoncalves\Filament\UsPrivacyRequests\UsPrivacyRequestsPlugin;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestStatus;
use JeffersonGoncalves\UsPrivacyRequests\Models\ConsumerRequest;
use JeffersonGoncalves\UsPrivacyRequests\RequestManager;
use LogicException;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Row and view-page actions: each one is a thin call to laravel-us-privacy-requests's RequestManager.
 *
 * Filament 3 has separate table and page action classes: pass TableAction::class for the table.
 */
class RequestActions
{
    /**
     * @param  class-string<Action|TableAction>  $class
     * @return list<Action|TableAction>
     */
    public static function all(string $class = Action::class): array
    {
        return [static::verify($class), static::fulfil($class), static::complete($class), static::reject($class), static::extend($class), static::recordAppeal($class), static::extendAppeal($class), static::decideAppeal($class), static::download($class)];
    }

    public static function verify(string $class = Action::class): Action|TableAction
    {
        return $class::make('verify')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.verify.label'))
            ->icon('heroicon-o-identification')
            ->color('info')
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Pending)
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.verify.description'))
            ->fillForm(fn (ConsumerRequest $record): array => [
                'subject_type' => static::subjectClass($record),
                'subject_id' => $record->getAttribute('subject_id'),
            ])
            ->form([
                Select::make('subject_type')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.subject_type'))
                    ->options(fn (): array => collect(UsPrivacyRequestsPlugin::get()->getSubjectModels())
                        ->mapWithKeys(fn (string $model): array => [$model => class_basename($model)])
                        ->all())
                    ->required(),
                TextInput::make('subject_id')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.subject_id'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data, MountableAction $action): void {
                $model = $data['subject_type'];

                // Only the listed models: never instantiate a class name taken from the request.
                $subject = in_array($model, UsPrivacyRequestsPlugin::get()->getSubjectModels(), true)
                    ? $model::query()->find($data['subject_id'])
                    : null;

                if (! $subject instanceof Model) {
                    Notification::make()->danger()->title(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.verify.not_found'))->send();
                    $action->halt();

                    return;
                }

                app(RequestManager::class)->verify($record, $subject);

                Notification::make()->success()->title(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.verify.success'))->send();
            });
    }

    /**
     * @param  class-string<Action|TableAction>  $class
     */
    public static function fulfil(string $class = Action::class): Action|TableAction
    {
        return $class::make('fulfil')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.fulfil.label'))
            ->icon('heroicon-o-play')
            ->color(fn (ConsumerRequest $record): string => $record->type->value === 'delete' ? 'danger' : 'success')
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Pending && $record->isVerified() && $record->type->isAutomatic())
            ->requiresConfirmation()
            ->modalDescription(fn (ConsumerRequest $record): string => __('filament-us-privacy-requests::filament-us-privacy-requests.actions.fulfil.description.'.$record->type->value))
            ->form([
                Textarea::make('response')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.response')),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->fulfil($record, $data['response'] ?? null), 'fulfil');
            });
    }

    /**
     * @param  class-string<Action|TableAction>  $class
     */
    public static function complete(string $class = Action::class): Action|TableAction
    {
        return $class::make('complete')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.complete.label'))
            ->icon('heroicon-o-check-circle')
            ->color('success')
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Pending && ! $record->type->isAutomatic())
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.complete.description'))
            ->form([
                Textarea::make('response')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.response'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->complete($record, $data['response']), 'complete');
            });
    }

    /**
     * @param  class-string<Action|TableAction>  $class
     */
    public static function reject(string $class = Action::class): Action|TableAction
    {
        return $class::make('reject')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.reject.label'))
            ->icon('heroicon-o-x-circle')
            ->color('danger')
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.reject.description'))
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Pending)
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.reason'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->reject($record, $data['reason']), 'reject');
            });
    }

    /**
     * @param  class-string<Action|TableAction>  $class
     */
    public static function extend(string $class = Action::class): Action|TableAction
    {
        return $class::make('extend')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.extend.label'))
            ->icon('heroicon-o-clock')
            ->color('warning')
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Pending && $record->extended_at === null)
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.extend.description'))
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.extension_reason'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->extend($record, $data['reason']), 'extend');
            });
    }

    public static function recordAppeal(string $class = Action::class): Action|TableAction
    {
        return $class::make('appeal')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.appeal.label'))
            ->icon('heroicon-o-scale')
            ->color('warning')
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.appeal.description'))
            ->visible(fn (ConsumerRequest $record): bool => in_array($record->status, [RequestStatus::Rejected, RequestStatus::Completed], true)
                && $record->appealed_at === null
                && ($record->rules()?->hasAppeals() ?? false))
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.appeal_reason')),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->appeal($record, $data['reason'] ?? null), 'appeal');
            });
    }

    public static function extendAppeal(string $class = Action::class): Action|TableAction
    {
        return $class::make('extend_appeal')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.extend_appeal.label'))
            ->icon('heroicon-o-clock')
            ->color('warning')
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.extend_appeal.description'))
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Appealed
                && $record->appeal_extended_at === null
                && ($record->rules()->appealExtensionDays ?? 0) > 0)
            ->form([
                Textarea::make('reason')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.extension_reason'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->extendAppeal($record, $data['reason']), 'extend_appeal');
            });
    }

    public static function decideAppeal(string $class = Action::class): Action|TableAction
    {
        return $class::make('decide_appeal')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.decide_appeal.label'))
            ->icon('heroicon-o-scale')
            ->color('info')
            ->modalDescription(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.decide_appeal.description'))
            ->visible(fn (ConsumerRequest $record): bool => $record->status === RequestStatus::Appealed)
            ->form([
                Select::make('decision')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.decision'))
                    ->options([
                        'granted' => __('filament-us-privacy-requests::filament-us-privacy-requests.appeal_result.granted'),
                        'denied' => __('filament-us-privacy-requests::filament-us-privacy-requests.appeal_result.denied'),
                    ])
                    ->required(),
                Textarea::make('response')
                    ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.fields.appeal_response'))
                    ->required(),
            ])
            ->action(function (ConsumerRequest $record, array $data): void {
                static::attempt(fn () => app(RequestManager::class)->decideAppeal($record, $data['decision'] === 'granted', $data['response']), 'decide_appeal');
            });
    }

    public static function download(string $class = Action::class): Action|TableAction
    {
        return $class::make('download')
            ->label(__('filament-us-privacy-requests::filament-us-privacy-requests.actions.download.label'))
            ->icon('heroicon-o-arrow-down-tray')
            ->color('gray')
            ->visible(fn (ConsumerRequest $record): bool => filled($record->export_path))
            ->action(fn (ConsumerRequest $record): StreamedResponse => Storage::disk(config('us-privacy-requests.disk'))
                ->download((string) $record->export_path));
    }

    /**
     * @return class-string<Model>|null
     */
    protected static function subjectClass(ConsumerRequest $record): ?string
    {
        $type = $record->getAttribute('subject_type');

        if (! is_string($type)) {
            return null;
        }

        $class = Model::getActualClassNameForMorph($type);

        return is_subclass_of($class, Model::class) ? $class : null;
    }

    protected static function attempt(callable $callback, string $action): void
    {
        try {
            $callback();
        } catch (LogicException $e) {
            // The manager guards the workflow (closed, unverified, no subject): surface why instead of a 500.
            Notification::make()->danger()->title($e->getMessage())->send();

            return;
        }

        Notification::make()->success()->title(__("filament-us-privacy-requests::filament-us-privacy-requests.actions.{$action}.success"))->send();
    }
}
