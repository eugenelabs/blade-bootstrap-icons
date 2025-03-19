<?php

namespace Eugenelabs\BladeBootstrapIcons;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

class BladeBootstrapIconsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory): void {
            $factory->add('bootstrap-icons', [
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => 'bi',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-bootstrap-icons'),
            ], 'blade-bootstrap-icons');
        }
    }
}
