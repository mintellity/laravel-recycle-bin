<?php

namespace Mintellity\LaravelRecycleBin;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRecycleBinServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-recycle-bin')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-recycle-bin_table');
    }
}