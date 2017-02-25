<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SupportProvider extends ServiceProvider
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
            "App\\Core\\Support\\Cart\\CartItemContract",
            "App\\Core\\Support\\Cart\\CartItem"
        );
    }
}
