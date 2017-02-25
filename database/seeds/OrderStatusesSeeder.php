<?php

use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->delete();

        DB::table('order_statuses')->insert([
            config('shop.order_statuses')
        ]);

    }
}
