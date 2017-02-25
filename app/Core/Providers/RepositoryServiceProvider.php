<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Core\Repositories\CategoryRepository',
            'App\Core\Repositories\EloquentCategoryRepository'
        );
        $this->app->bind(
            'App\Core\Repositories\MediaManagementRepository',
            'App\Core\Repositories\MediaManagementRepositoryEloquent'
        );
        $this->app->bind(
            'App\Core\Repositories\UserRepository',
            'App\Core\Repositories\EloquentUserRepository'
        );
    }
}
