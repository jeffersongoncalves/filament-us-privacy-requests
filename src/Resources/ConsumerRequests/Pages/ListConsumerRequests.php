<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\Filament\UsPrivacyRequests\Resources\ConsumerRequests\ConsumerRequestResource;

class ListConsumerRequests extends ListRecords
{
    protected static string $resource = ConsumerRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
