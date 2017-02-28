<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Queue\SerializesModels;

class ClearSession
{
    use InteractsWithSockets, SerializesModels;

    /**
     * ClearSession constructor.
     */
    public function __construct()
    {
        $path = base_path('tmp/'.'session_clear');
        if (\File::isDirectory($path)) {
            \File::put($path, 'clear');
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('clear-user-session');
    }
}
