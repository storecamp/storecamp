<?php

use Illuminate\Database\Seeder;

class CurrencySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['name' => 'USD', 'code' => 'USD', 'main' => 1, 'sign'=> '$'],
            ['name' => 'EUR', 'code' => 'EUR', 'main' => 0, 'sign' => '&euro;'],
            ['name' => 'GBP', 'code' => 'GBP', 'main' => 0, 'sign' => '&pound;'],

        ];

        foreach ($items as $item) {
           \App\Core\Models\Currency::create($item);
        }
    }
}
