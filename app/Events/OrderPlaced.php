<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class OrderPlaced
 * @package App\Events
 */
class OrderPlaced
{
	use SerializesModels;

	/**
     * Order ID.
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