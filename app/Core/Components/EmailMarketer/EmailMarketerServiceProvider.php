<?php

namespace App\Core\Components\EmailMarketer;
use App\Core\Components\EmailMarketer\MailCampaigner;


use Illuminate\Support\ServiceProvider;

/**
 * Service provider to add the console command to laravel
 */
class EmailMarketerServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEmailCommandGenerator();
    }
    /**
     * Register the mail:campaign command.
     */
    private function registerEmailCommandGenerator()
    {
        $this->app->singleton('command.mail.campaign', function ($app) {
            return $app[MailCampaigner::class];
        });

        $this->commands('command.mail.campaign');
    }
}