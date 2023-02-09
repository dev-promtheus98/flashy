<?php

namespace DevPromtheus98\Flashy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use DevPromtheus98\Flashy\Commands\FlashyCommand;

class FlashyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('flashy');
    }

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \DevPromtheus98\Flashy\SessionStore::class,
            \DevPromtheus98\Flashy\LaravelSessionStore::class
        );

        $this->app->singleton('flashy', function () {
            return $this->app->make(\DevPromtheus98\Flashy\FlashyNotifier::class);
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'flashy');

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/vendor/flashy')
        ]);
    }
}
