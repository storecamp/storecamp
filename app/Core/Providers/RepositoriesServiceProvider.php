<?php

namespace App\Core\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesServiceProvider.
 */
class RepositoriesServiceProvider extends ServiceProvider
{
    protected $defer = false;

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
        $models = [
            'Media',
            'Products',
            'NewsLetterList',
            'ProductReview',
            'Mail',
            'Orders',
            'Layout',
            'Promocode',
            'Returns',
            'StaticPages',
            'Thread',
            'Message',
            'Participant',
            'Settings',
            'Menu',
            'Parser'
        ];

        foreach ($models as $repo) {
            $this->app->bind(
                "App\\Core\\Repositories\\{$repo}Repository",
                "App\\Core\\Repositories\\{$repo}RepositoryEloquent"
            );
        }
    }
}
