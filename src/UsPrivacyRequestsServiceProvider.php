<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests;

use JeffersonGoncalves\FilamentPluginCore\BasePackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class UsPrivacyRequestsServiceProvider extends BasePackageServiceProvider
{
    public static string $name = 'filament-us-privacy-requests';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasTranslations();
    }
}
