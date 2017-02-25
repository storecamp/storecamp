<?php

use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $globalCampaign = \App\Core\Models\Campaign::create([
            "campaign" => "Global"
        ]);

        $subscriberOne = \App\Core\Models\Subscribers::create(['email' => 'nikoleivan@gmail.com']);
        $subscriberTwo = \App\Core\Models\Subscribers::create(['email' => 'mmoes@combird.nl']);

        $globalCampaign->subscribers()->sync([$subscriberOne->id, $subscriberTwo->id]);

        \App\Core\Models\Campaign::create([
            "campaign" => "Clients"
        ]);
    }
}
