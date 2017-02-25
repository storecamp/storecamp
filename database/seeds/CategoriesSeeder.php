<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Laptops' => [
                'Acer',
                'Apple',
                'Asus',
                'Dell',
                'Goclever',
                'HP',
                'Lenovo',
                'MSI',
                'Prestigio',
                'Razer',
                'Toshiba',
                'Xiaomi'
            ],
            'PC' => [
                'Components',
                'Monitors',
                'Motherboards',
                'HDD',
                'SSD',
                'Computer Cases',
                'Monoblocks',
                'CPU processors',
                'Graphic Cards',
                'Memory (RAM)',
                'Fans and coolers',
                'Computer Accessories'
            ],
            'Phones' => [
                'Acer',
                'Apple',
                'Asus',
                'Doogee',
                'Alcatel',
                'Apple',
                'Doogee',
                'Fly',
                'Gigabyte',
                'Goclever',
                'HTC',
                'Huawei',
                'LG',
                'LeEco',
                'LeTV',
                'Lenovo',
                'Matrix',
                'Meizu',
                'Microsoft',
                'Motorola',
                'Nokia',
                'OnePlus',
                'Philips',
                'Pixus',
                'Prestigio',
                'RugGear',
                'Samsung',
                'Sigma',
                'Sony',
                'Xiaomi',
                'ZTE'
            ],
            'TV' => [
                'televisions',
                'Cables and adapters',
                'Supports, fastening TV',
                'TV antennas and receivers',
                'TV Accessories',
                'Universal remote controls'
            ],
            'Audio' => [
                'home audio',
                'Acoustics',
                'Portable audio',
                'Audio Accessories',
                'A stereo'
            ]
        ];

        foreach (array_keys($categories) as $category) {
            $newCategory = \App\Core\Models\Category::create([
                'name' => $category,
                'description' => $category
            ]);
            foreach ($categories[$category] as $child) {
                $childCategory = \App\Core\Models\Category::create([
                    'parent_id' => $newCategory->id,
                    'name' => $child,
                    'description' => $child
                ]);
            }
        }
    }
}
