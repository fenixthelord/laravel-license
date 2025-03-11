<?php
// src/Providers/AuthPackageServiceProvider.php
namespace YourVendor\AuthPackage\Providers;

use Illuminate\Support\ServiceProvider;

class AuthPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');
        
        $this->publishes([
            __DIR__.'/../../config/auth-package.php' => config_path('auth-package.php'),
        ], 'config');

        $this->publishesMigrations([
            __DIR__.'/../../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/auth-package.php', 'auth-package'
        );
    }
}
