<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;
use App\Core\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            $product = Product::create([
                'title' => $faker->company." - ".$faker->numberBetween(1, 72),
                'model' => $faker->company,
                'body' => $faker->paragraphs(5, true),
                'price' => $faker->randomNumber(3, true).".".$faker->numberBetween(0, 99),
                'availability' => $faker->boolean,
                'date_available' => $faker->date(),
                'quantity' => $faker->numberBetween(0, 1000),
                'viewed' => $faker->numberBetween(0, 10000),
                'meta_tag_title' => $faker->title,
                'meta_tag_description' => $faker->paragraph(),
                'meta_tag_keywords' => $faker->word,
                'stock_status' => $faker->boolean,
            ]);
            $product->categories()->attach([$faker->numberBetween(1, 72)]);
        }

    }
}
