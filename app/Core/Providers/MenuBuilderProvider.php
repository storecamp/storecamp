<?php

namespace App\Core\Providers;

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
        (new SidebarMenuBuilder())->createStatic();
    }

    public function getItems() {
        $this->boot();
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
