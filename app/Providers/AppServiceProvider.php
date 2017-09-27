<?php

namespace App\Providers;

use App\Core\Providers\CustomValidatorServiceProvider;
use App\Core\Providers\FolderServiceProvider;
use App\Core\Providers\GeneratorsServiceProvider;
use App\Core\Providers\LogicServiceProvider;
use App\Core\Providers\MailServiceProvider;
use App\Core\Providers\MenuBuilderProvider;
use App\Core\Providers\RepositoriesServiceProvider;
use App\Core\Providers\SupportProvider;
use App\Core\Providers\ViewComposerServiceProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $storecampProviders = [
        CustomValidatorServiceProvider::class,
        FolderServiceProvider::class,
        GeneratorsServiceProvider::class,
        LogicServiceProvider::class,
        MailServiceProvider::class,
        MenuBuilderProvider::class,
        RepositoriesServiceProvider::class,
        SupportProvider::class,
        ViewComposerServiceProvider::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Illuminate\Pagination\LengthAwarePaginator::defaultView('site.partials.paginator');
        foreach ($this->storecampProviders as $provider) {
            $this->app->register($provider);
        }

        ini_set('curl.cainfo', asset('cacert.pem'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
