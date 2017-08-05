<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsParserSeeder extends Seeder
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

            $faker = Faker::create();
            $categories = \App\Core\Models\Category::all();
            foreach ($categories as $category) {
                $model = app(\App\Core\Repositories\ParserRepository::class)->findOrFail(1);
                $newsearch = new \App\Core\Parsers\Rozetka\Rozetka($model, 1);
                $result = $newsearch->parse($category->name, function ($results) use ($faker, $category) {
                    if (!empty($results)) {
                        foreach ($results as $result) {
                            $product = \App\Core\Models\Product::create([
                                'title'                => !empty($result['name']) ? $result['name'] : $faker->company.' - '.$faker->numberBetween(1, 72),
                                'model'                => $category->name,
                                'body'                 => !empty($result['detail']) ? $result['detail'] : $faker->paragraphs(5, true),
                                'price'                => !empty($result['price_usd']) ? $result['price_usd'] : $faker->randomNumber(3, true).'.'.$faker->numberBetween(0, 99),
                                'availability'         => $faker->boolean,
                                'date_available'       => $faker->date(),
                                'quantity'             => $faker->numberBetween(0, 1000),
                                'viewed'               => $faker->numberBetween(0, 10000),
                                'meta_tag_title'       => !empty($result['name']) ? $result['name'] : $faker->company.' - '.$faker->numberBetween(1, 72),
                                'meta_tag_description' => !empty($result['detail']) ? $result['detail'] : $faker->paragraphs(5, true),
                                'meta_tag_keywords'    => $faker->word,
                                'stock_status'         => $faker->boolean,
                            ]);

                            $product->categories()->attach($category->id);
                        }
                    }
                });
            }
        }
    }
}
