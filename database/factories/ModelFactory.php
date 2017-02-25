<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Core\Models\User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Core\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title,
        'model' => $faker->company,
        'body' => $faker->paragraphs(5, true),
        'price' => $faker->randomNumber(3, true),
        'availability' => $faker->boolean,
        'date_available' => $faker->date(),
        'quantity' => $faker->numberBetween(0, 1000),
        'viewed' => $faker->numberBetween(0, 10000),
        'meta_tag_title' => $faker->title,
        'meta_tag_description' => $faker->paragraph(),
        'meta_tag_keywords' => $faker->word,
        'stock_status' => $faker->boolean,
    ];
});