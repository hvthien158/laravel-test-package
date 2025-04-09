<?php

namespace Thien\LaravelTestPackage;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Thien\LaravelTestPackage\Commands\LaravelTestPackageCommand;

class LaravelTestPackageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-test-package')
            ->hasViews();
    }
}
