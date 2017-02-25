<?php namespace App\Core\Components\Messenger;

use Illuminate\Support\ServiceProvider;

class MessengerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __dir__.'/../config/config.php' => config_path('messenger.php'),
//            __dir__.'/../migrations' => base_path('database/migrations'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __dir__.'/../config/config.php', 'messenger'
        );
    }
}
