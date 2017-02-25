<?php

namespace App\Core\Components\Menu;


class SidebarMenuBuilder
{
    /**
     * create sidebar menu structure
     */
    public function createStructure()
    {
        $productsMenu = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-cube"></i> Products')
            ->addLink('List of Products', ['route' => 'admin::products::index'])
            ->addLink('Create Product', ['route' => ['admin::products::create']]);

        $productReviews = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-newspaper-o"></i> Product Reviews')
            ->addLink('<span class="nav-text"> List of Reviews</span>',
                ['route' => 'admin::reviews::index']);

        $categories = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-archive"></i> Categories')
            ->addLink('All Categories', ['route' => 'admin::categories::index'])
            ->addLink('Create Category', ['route' => ['admin::categories::create']]);

        $attributes = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-puzzle-piece"></i> Attributes')
            ->addLink('Attributes', ['route' => 'admin::attributes::index'])
            ->addLink('Attribute Groups', ['route' => ['admin::attribute_groups::index']]);

        $sales = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-shopping-cart"></i> Sales')
            ->addLink('Orders', ['route' => 'admin::sales::orders::index'])
            ->addLink('Returns', ['route' => ['admin::attribute_groups::index']])
            ->addLink('Promocodes', ['route' => ['admin::attribute_groups::index']]);

        $marketing = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-line-chart"></i> Marketing')
            ->addLink('Subscribers', ['route' => 'admin::subscribers::index'])
            ->addLink('Mail', ['route' => ['admin::mail::index']]);

        $design = app('elements.menu.manager')
            ->createMenu('<i class="fa  fa-paint-brush"></i> Design')
            ->addLink('Layouts', ['route' => 'admin::design::layouts::index'])
            ->addLink('Banners', ['route' => 'admin::design::banners::index'])
            ->addLink('Static Pages', ['route' => ['admin::design::staticPages::index']]);

        $users = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-users"></i> Users')
            ->addLink('All Users', ['route' => 'admin::users::index'])
            ->addLink('Create User', ['route' => ['admin::users::create']]);

        $mediaStorage = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-files-o"></i> MediaStorage')
            ->addLink('Media Storage', ['route' => 'admin::media::indexs']);

        $access = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-key"></i> Access')
            ->addLink('All roles', ['route' => 'admin::roles::index'])
            ->addLink('Create role', ['route' => 'admin::roles::create']);

        $logsViewer = app('elements.menu.manager')
            ->createMenu('<i class="fa fa-bug"></i> LogsViewer')
            ->addLink('<i class="fa fa-dashboard"></i> Dashboard', ['route' => 'log-viewer::dashboard'])
            ->addLink('<i class="fa fa-archive"></i> Logs', ['route' => 'log-viewer::logs.list']);

        /**
         * declare sidebar administration menu
         */
        $administrationMenu = app('elements.menu.manager')
            ->setStructureClasses(
                ['root_class' => "sidebar-menu", 'li_class' => "treeview", 'ul_class' => "treeview-menu", 'a_class' => "link"]
            )
            ->menu('administration')
            ->setLabel('Administration')
            ->addSubMenu($mediaStorage, ['id' => 'link-media', 'url_def' => ['route_pattern' => 'admin::media::*']])
            ->addSubMenu($access, ['id' => 'link-access', 'url_def' => ['route_pattern' => 'admin::roles::*']])
            ->addSubMenu($logsViewer, ['id' => 'link-logs', 'url_def' => ['route_pattern' => 'log-viewer::*']]);

        /**
         * declare sidebar menu
         */
        $menu = app('elements.menu.manager')->setStructureClasses(
            ['root_class' => "sidebar-menu", 'li_class' => "treeview", 'ul_class' => "treeview-menu", 'a_class' => "link"]
        )
            ->menu('sidebar')
            ->setLabel('MAIN NAVIGATION')
            ->addLink('<i class="fa fa-th"></i> Widgets', ['route' => 'admin::dashboard'])
            ->addSubMenu($users, ['id' => 'link-users', 'url_def' => ['route_pattern' => 'admin::users::*']])
            ->addSubMenu($design, ['id' => 'link-design', 'url_def' => ['route_pattern' => 'admin::design::*']])
            ->addSubMenu($marketing, ['id' => 'link-marketing', 'url_def' => ['route_pattern' => 'admin::marketing::*']])
            ->addSubMenu($sales, ['id' => 'link-sales', 'url_def' => ['route_pattern' => 'admin::sales::*']])
            ->addSubMenu($attributes, ['id' => 'link-attributes', 'url_def' => ['route_pattern' => 'admin::attributes::*']])
            ->addSubMenu($categories, ['id' => 'link-categories', 'url_def' => ['route_pattern' => 'admin::categories::*']])
            ->addSubMenu($productReviews, ['id' => 'link-reviews', 'url_def' => ['route_pattern' => 'admin::reviews::*']])
            ->addSubMenu($productsMenu, ['id' => 'link-products', 'url_def' => ['route_pattern' => 'admin::products::*']]);
    }
}