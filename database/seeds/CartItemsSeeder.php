<?php

use Illuminate\Database\Seeder;

class CartItemsSeeder extends Seeder
{
    protected $cartSystem;

    /**
     * CartItemsSeeder constructor.
     *
     * @param $cartSystem
     */
    public function __construct(\App\Core\Contracts\CartSystemContract $cartSystem)
    {
        $this->cartSystem = $cartSystem;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    }
}
