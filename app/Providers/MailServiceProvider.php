<?php

namespace App\Providers;

use App\Core\Models\Mail;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
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
        \Event::listen('Illuminate\Mail\Events\MessageSending', function($message)
        {
        });

    }
}
