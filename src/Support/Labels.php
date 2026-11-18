<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Support;

use Illuminate\Database\Eloquent\Model;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestStatus;
use JeffersonGoncalves\UsPrivacyRequests\Enums\RequestType;
use JeffersonGoncalves\UsPrivacyRequests\Models\ConsumerRequest;

class Labels
{
    /**
     * @return array<string, string>
     */
    public static function types(): array
    {
        return collect(RequestType::cases())->mapWithKeys(fn (RequestType $type): array => [$type->value => static::type($type->value)])->all();
    }

    public static function type(string $type): string
    {
        return __("filament-us-privacy-requests::filament-us-privacy-requests.type.{$type}");
    }

    /**
     * @return array<string, string>
     */
    public static function statuses(): array
    {
        return collect(RequestStatus::cases())->mapWithKeys(fn (RequestStatus $status): array => [$status->value => static::status($status->value)])->all();
    }

    public static function status(string $status): string
    {
        return __("filament-us-privacy-requests::filament-us-privacy-requests.status.{$status}");
    }

    public static function statusColor(string $status): string
    {
        return match ($status) {
            RequestStatus::Completed->value => 'success',
            RequestStatus::Rejected->value => 'danger',
            RequestStatus::Appealed->value => 'info',
            default => 'warning',
        };
    }

    public static function subject(ConsumerRequest $record): ?string
    {
        $type = $record->getAttribute('subject_type');

        if (! is_string($type)) {
            return null;
        }

        return class_basename(Model::getActualClassNameForMorph($type)).' #'.$record->getAttribute('subject_id');
    }
}
