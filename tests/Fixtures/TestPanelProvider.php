<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\UsPrivacyRequests\UsPrivacyRequestsPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugins([
                UsPrivacyRequestsPlugin::make(),
            ]);
    }
}
