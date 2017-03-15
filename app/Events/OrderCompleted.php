<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class OrderCompleted.
 */
class OrderCompleted
{
    use SerializesModels;

    /**
     * Order ID.
     *
     * @var int
     */
    public $id;

    /**
     * Create a new event instance.
     *
     * @param int $id Order ID.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }
}
