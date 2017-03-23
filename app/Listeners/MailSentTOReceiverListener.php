<?php

namespace App\Listeners;

use App\Events\MailSentTOReceiver;

class MailSentTOReceiverListener
{
    /**
     * MailSentTOReceiverListener constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param MailSentTOReceiver $event
     *
     * @return void
     */
    public function handle(MailSentTOReceiver $event)
    {
        echo $event->data;
    }
}
