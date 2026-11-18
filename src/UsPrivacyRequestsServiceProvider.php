<?php

namespace JeffersonGoncalves\Filament\UsPrivacyRequests;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UsPrivacyRequestsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-us-privacy-requests')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigrations();
    }
}
