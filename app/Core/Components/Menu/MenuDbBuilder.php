<?php

namespace App\Core\Components\Menu;

use App\Core\Models\MenuItems;
use App\Core\Models\Menu;

/**
 * Class MenuDbBuilder.
 */
class MenuDbBuilder
{
    /**
     * @var Menu
     */
    protected $menu;
    /**
     * @var MenuItems
     */
    protected $menuItems;

    /**
     * MenuDbBuilder constructor.
     *
     * @param $menu
     * @param $menuItems
     */
    public function __construct(Menu $menu, MenuItems $menuItems)
    {
        $this->menu = $menu;
        $this->menuItems = $menuItems;
    }

    /**
     * @param string $menuName
     * @param string $type
     * @param array  $options
     *
     * @throws \App\Core\Exceptions\MenuTypeNotFound
     *
     * @return \Illuminate\Support\HtmlString
     */
    public function renderFromDb($menuName = 'string', $type = 'default', array $options = [])
    {
        // GET THE MENU - sort collection in blade
        $menu = $this->menu->where('name', '=', $menuName)
            ->with('parent_items.children')
            ->first();
        // Convert options array into object
        $options = (object) $options;
        // Check for Menu Existence
        if (!isset($menu)) {
            throw new \App\Core\Exceptions\MenuTypeNotFound('Menu not Found', 422);
        }

        if (in_array($type, ['build', 'navigation', 'default'])) {
            $view = 'admin.tools.menu.'.$type;
        } else {
            throw new \App\Core\Exceptions\MenuTypeNotFound('Type not Found or Specified', 422);
        }

        return new \Illuminate\Support\HtmlString(
            view($view, ['items' => $menu->parent_items, 'options' => $options])
        );
    }
}
