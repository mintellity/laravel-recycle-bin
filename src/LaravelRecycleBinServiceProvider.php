<?php

namespace Mintellity\LaravelRecycleBin;

use Livewire\Livewire;
use Mintellity\LaravelRecycleBin\Http\Livewire\RecycleBin;
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
            ->hasViews();
    }

    public function bootingPackage()
    {
        parent::bootingPackage();

        Livewire::component('recycle-bin::recycle-bin', RecycleBin::class);
    }
}
