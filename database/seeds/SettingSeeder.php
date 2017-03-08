<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settingSet = settingSet('name');
        $settingSet->fill([
            'value' => 'StoreCamp',
            'type' => 'text',
            'order' => 1,
        ])->save();

        $settingSet = settingSet('description');
        $settingSet->fill([
            'value' => 'Site Description',

            'type' => 'text',
            'order' => 2,
        ])->save();

        $settingSet = settingSet('currency');
        $settingSet->fill([
            'value' => 'USD',

            'type' => 'text',
            'order' => 3,
        ])->save();

        $settingSet = settingSet('currency_symbol');
        $settingSet->fill([
            'value' => '$',

            'type' => 'text',
            'order' => 4,
        ])->save();

        $settingSet = settingSet('tax_percent');
        $settingSet->fill([
            'value' => 21,

            'type' => 'text',
            'order' => 5,
        ])->save();

        $settingSet = settingSet('display_price_format');
        $settingSet->fill([
            'value' => ':symbol:price (:currency)',

            'type' => 'text',
            'order' => 6,
        ])->save();

        $settingSet = settingSet('allow_multiple_coupons');
        $settingSet->fill([
            'value' => true,

            'type' => 'text',
            'order' => 7,
        ])->save();


        $settingSet = settingSet('google_analytics_client_id');
        $settingSet->fill([
            'value' => 'Google Analytics Client ID',

            'type' => 'text',
            'order' => 8,
        ])->save();
    }
}
