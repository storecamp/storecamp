<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Models\Menu;
use App\Core\Models\MenuItems;
use Illuminate\Http\Request;

/**
 * Class IndexsController.
 */
class IndexController extends BaseController
{
    public $viewPathBase = 'site.home.';
    public $errorRedirectPath = 'site::';

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);

        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Dashboard',
            'url'        => route('admin::dashboard', [], false),
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => '',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Products',
            'url'        => route('admin::products::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Categories',
            'url'        => route('admin::categories::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-news',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Attributes',
            'url'        => route('admin::attributes::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Attribute Groups',
            'url'        => route('admin::attribute_groups::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 8,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Product Reviews',
            'url'        => route('admin::reviews::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-file-text',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Categories',
            'url'        => route('admin::categories::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lock',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Orders',
            'url'        => route('admin::sales::orders::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Subscribers',
            'url'        => route('admin::subscribers::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 10,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Mail',
            'url'        => route('admin::mail::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 11,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Layouts',
            'url'        => route('admin::design::layouts::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 12,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Banners',
            'url'        => route('admin::design::banners::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 13,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Users',
            'url'        => route('admin::users::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 15,
            ])->save();
        }


        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Settings',
            'url'        => route('admin::settings::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 16,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Media Storage',
            'url'        => route('admin::media::indexs'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 17,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'All roles',
            'url'        => route('admin::roles::index'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 18,
            ])->save();
        }

        $toolsMenuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'LogsViewer',
            'url'        => route('log-viewer::dashboard'),
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 19,
            ])->save();
        }

        $menuItem = MenuItems::firstOrNew([
            'menu_id'    => $menu->id,
            'title'      => 'Menu Builder',
            'url'        => route('admin::menus::index', [], false),
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-list',
                'color' => null,
                'parent_id' => $toolsMenuItem->id,
                'order' => 20,
            ])->save();
        }
        return $this->view('index');
    }
}
