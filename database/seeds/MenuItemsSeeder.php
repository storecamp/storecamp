<?php

use Illuminate\Database\Seeder;
use \App\Core\Models\MenuItems;

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
            'name' => 'admin'
        ]);

        $menuItemInstance = app('App\Core\Repositories\MenuItemsRepository');

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Dashboard',
            'route' => 'admin::dashboard',
            'target' => '_self',
            'icon_class' => '',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);


        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Products',
            'route' => 'admin::products::index',
            'target' => '_self',
            'icon_class' => 'voyager-images',
            'color' => null,
            'parent_id' => null,
            'order' => 5,
        ]);

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Categories',
            'route' => 'admin::categories::index',
            'target' => '_self',
            'icon_class' => 'voyager-news',
            'color' => null,
            'parent_id' => null,
            'order' => 6,
        ]);

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Attributes',
            'route' => 'admin::attributes::index',
            'target' => '_self',
            'icon_class' => 'voyager-person',
            'color' => null,
            'parent_id' => null,
            'order' => 3,
        ]);


        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Attribute Groups',
            'route' => 'admin::attribute_groups::index',
            'target' => '_self',
            'icon_class' => 'voyager-categories',
            'color' => null,
            'parent_id' => null,
            'order' => 8,
        ]);

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Product Reviews',
            'route' => 'admin::reviews::index',
            'target' => '_self',
            'icon_class' => 'voyager-file-text',
            'color' => null,
            'parent_id' => null,
            'order' => 7,
        ]);

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Categories',
            'route' => 'admin::categories::index',
            'target' => '_self',
            'icon_class' => 'voyager-lock',
            'color' => null,
            'parent_id' => null,
            'order' => 2,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Orders',
            'route' => 'admin::sales::orders::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 9,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Subscribers',
            'route' => 'admin::subscribers::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 10,
        ]);
        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Mail',
            'route' => 'admin::mail::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 11,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Layouts',
            'route' => 'admin::design::layouts::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 12,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Banners',
            'route' => 'admin::design::banners::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 13,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Users',
            'route' => 'admin::users::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 15,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Settings',
            'route' => 'admin::settings::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 16,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Media Storage',
            'route' => 'admin::media::indexs',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 17,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'All roles',
            'route' => 'admin::roles::index',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 18,
        ]);

        $toolsMenuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'LogsViewer',
            'route' => 'log-viewer::dashboard',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 19,
        ]);

        $menuItem = $menuItemInstance->createOrFirst([
            'menu_id' => $menu->id,
            'title' => 'Menu Builder',
            'route' => 'admin::menus::index',
            'target' => '_self',
            'icon_class' => 'voyager-list',
            'color' => null,
            'parent_id' => $toolsMenuItem->id,
            'order' => 20,
        ]);
    }
}
