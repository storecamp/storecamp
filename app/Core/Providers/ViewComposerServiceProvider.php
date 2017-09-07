<?php

namespace App\Core\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', 'App\Core\Http\Composers\Auth');
        view()->composer('site.*', 'App\Core\Http\Composers\Site');
        view()->composer('site.partials.sidebar', 'App\Core\Http\Composers\Sidebar');
        view()->composer('admin.partials.mainheader', 'App\Core\Http\Composers\AdminNavigation');
        view()->composer('site.partials.mainheader', 'App\Core\Http\Composers\Navigation');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
