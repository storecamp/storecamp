<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();

        $this->call(AccessSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(FolderTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductReviewSeeder::class);
        $this->call(CartItemsSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(MailTemplatesToMediaSeeder::class);

        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
