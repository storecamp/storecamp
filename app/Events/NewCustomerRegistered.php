<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewCustomerRegistered extends Event
{
    use SerializesModels;

    public $user;

    /**
     * NewCustomerRegistered constructor.
     * @param \App\Core\Models\User $user
     */
    public function __construct(\App\Core\Models\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user-registered'];
    }
}
