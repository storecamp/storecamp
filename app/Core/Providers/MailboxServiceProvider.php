<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 9/24/2017
 * Time: 11:48 PM
 */

namespace App\Core\Providers;


use App\Core\Commands\SendCommand;
use App\Core\Handlers\MailEventHandler;
use Illuminate\Mail\MailServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class MailboxServiceProvider extends MailServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->commands([
            SendCommand::class
        ]);
    }

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        \Queue::before(function (JobProcessing $event) {
            //Perform some actions when queue is triggered
        });

        \Queue::after(function (JobProcessed $event) {
            $data = $event->job->payload();
            if($data["displayName"]  == "App\\Mail\\DeliverMail") {
                \Log::info('Email is sent');
            }
        });

        \Event::subscribe(MailEventHandler::class);
    }

}
