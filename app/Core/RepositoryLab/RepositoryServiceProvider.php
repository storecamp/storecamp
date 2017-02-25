<?php

namespace RepositoryLab\Repository;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoryServiceProvider
 * @package RepositoryLab\Repository\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/repository.php' => config_path('repository.php')
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/config/repository.php', 'repository'
        );

        $this->loadTranslationsFrom(__DIR__ . '/lang', 'repository');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\RepositoryLab\Repository\EventServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}