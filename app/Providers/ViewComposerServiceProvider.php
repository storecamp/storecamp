<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('site.partials.sidebar', 'App\Core\Http\Composers\Sidebar');
        view()->composer('partials.mainheader', 'App\Core\Http\Composers\AdminNavigation');
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
