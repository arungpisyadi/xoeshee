<?php

namespace Arungpisyadi\Xoeshee;

use Arungpisyadi\Xoeshee\Commands\XoesheeInstall;
use Illuminate\Support\ServiceProvider;

class XoesheeServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'arungpisyadi');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'arungpisyadi');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/xoeshee.php', 'xoeshee');

        // Register the service the package provides.
        $this->app->singleton('xoeshee', function ($app) {
            return new Xoeshee;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['xoeshee'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/xoeshee.php' => config_path('xoeshee.php'),
        ], 'xoeshee.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/arungpisyadi'),
        ], 'xoeshee.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/arungpisyadi'),
        ], 'xoeshee.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/arungpisyadi'),
        ], 'xoeshee.views');*/

        // Registering package commands.
        $this->commands([
            XoesheeInstall::class,
        ]);
    }
}
