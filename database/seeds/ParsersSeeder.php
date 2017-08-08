<?php

use Illuminate\Database\Seeder;

class ParsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('WITH_ROZETKA')) {
            \App\Core\Base\Model::unguard();

            $parser = \App\Core\Models\Parser::create([
                'name'         => 'Rozetka',
                'url'          => 'http://rozetka.com.ua/',
                'image'        => 'img/parsers/rozetka.png',
                'search_query' => 'search/?text={text}&p={page}',
            ]);
        }
    }
}
