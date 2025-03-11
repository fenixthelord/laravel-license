<?php

namespace LaravelLicense\License;

use Illuminate\Support\ServiceProvider;

class LicenseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/laravel-license.php' => config_path('laravel-license.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    
        $this->commands([
            \LaravelLicense\License\Console\Commands\GenerateLicense::class
        ]);

        $this->registerMiddleware();

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/laravel-license.php', 'laravel-license'
        );
    }

  

protected function registerMiddleware()
{
    app('router')->aliasMiddleware('license', 
        \LaravelLicense\License\Http\Middleware\CheckLicense::class
    );
}
}
