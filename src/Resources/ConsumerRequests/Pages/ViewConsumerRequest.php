<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages;

use Filament\Resources\Pages\ViewRecord;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Actions\RequestActions;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\ConsumerRequestResource;

class ViewConsumerRequest extends ViewRecord
{
    protected static string $resource = ConsumerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return RequestActions::all();
    }
}
