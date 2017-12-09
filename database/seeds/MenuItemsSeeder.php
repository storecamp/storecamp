<?php

use Illuminate\Database\Seeder;

class MenuItemsSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        $menu = \App\Core\Models\Menu::firstOrCreate([
            'name' => 'modules',
        ]);

        $menuItemInstance = new \App\Core\Models\MenuItems();

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id'    => $menu->id,
            'title'      => 'Modules',
            'route'      => 'admin::modules::index',
            'target'     => '_self',
            'icon_class' => 'fa fa-list',
            'color'      => null,
            'parent_id'  => null,
            'order'      => 1,
        ]);
    }
}
