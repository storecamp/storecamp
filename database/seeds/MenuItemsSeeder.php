<?php

use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = \App\Core\Models\Menu::firstOrCreate([
            'name' => 'admin',
        ]);

        $menuItemInstance = app('App\Core\Repositories\MenuItemsRepository');

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Modules',
            'route' => 'admin::module',
            'target' => '_self',
            'icon_class' => 'fa fa-th',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
            '',
        ]);
    }
}
