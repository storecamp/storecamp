<?php

namespace App\Listeners;

use App\Events\ClearSession;

class ClearSessionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ClearSession $event
     *
     * @return void
     */
    public function handle(ClearSession $event)
    {
        //
    }
}
