<?php

namespace App\Providers;

use App\Core\Components\Menu\SidebarMenuBuilder;
use Illuminate\Support\ServiceProvider;

class MenuBuilderProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        (new SidebarMenuBuilder())->createStructure();
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
