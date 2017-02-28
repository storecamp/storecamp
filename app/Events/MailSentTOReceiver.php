<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class MailSentTOReceiver extends Event
{
    use SerializesModels;

    public $data;

    /**
     * MailSentTOReceiver constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['campaign-email-sent'];
    }
}
