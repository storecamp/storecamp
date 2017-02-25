<?php


namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class RepositoriesServiceProvider
 * @package App\Providers
 */
class RepositoriesServiceProvider extends ServiceProvider
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
        $models = [
            'Media',
            'Folder',
            'Category',
            'User',
            'Roles',
            'Products',
            'Permission',
            'AttributeGroup',
            'AttributeGroupDescription',
            'NewsLetterList',
            'ProductReview',
            'Subscribers',
            'Campaign',
            'Mail',
            'Orders',
            'Banner',
            'Layout',
            'Promocode',
            'Returns',
            'StaticPages',
            'Cart'
        ];

        foreach ($models as $repo) {
            $this->app->bind(
                "App\\Core\\Repositories\\{$repo}Repository",
                "App\\Core\\Repositories\\{$repo}RepositoryEloquent"
            );
        }
    }
}
