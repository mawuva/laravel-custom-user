<?php

namespace Mawuekom\CustomUser;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Mawuekom\CustomUser\Commands\InstallCommand;

class CustomUserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        require_once __DIR__.'/helpers.php';
        
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'custom-user');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'custom-user');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this ->checkAttributeAvailability();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/custom-user.php' => config_path('custom-user.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../database/seeders/publish' => database_path('seeders'),
            ], 'seeders');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/custom-user'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/custom-user'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/custom-user'),
            ], 'lang');*/

            // Registering package commands.
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/custom-user.php', 'custom-user');

        // Register the main class to use with the facade
        $this->app->singleton('custom-user', function () {
            return new CustomUser;
        });
    }

    /**
     * Check attributes availability
     * 
     * @return void
     */
    private function checkAttributeAvailability()
    {
        Blade::if('enabledAttribute', function ($attribute) {
            return get_attribute($attribute, 'enabled');
        });
    }
}
