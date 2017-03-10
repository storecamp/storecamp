<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Menu;
use App\Core\Repositories\MenuItemsRepository;
use App\Core\Transformers\MenusDataTransformer;
use Illuminate\Http\Request;
use App\Core\Repositories\MenuRepository;
use Yajra\Datatables\Datatables;

/**
 * Class MenusController
 * @package App\Http\Controllers
 */
class MenuController extends BaseController {

    /**
     * @var MenuRepository
     */
    private $menu;
    /**
     * @var MenuItemsRepository
     */
    private $menuItems;

    public $viewPathBase = 'admin.tools.menus';
    public $errorRedirectPath = 'admin::menu::index';

    /**
     * MenuController constructor.
     * @param MenuRepository $menu
     * @param MenuItemsRepository $menuItems
     */
    public function __construct(MenuRepository $menu, MenuItemsRepository $menuItems)
    {
        $this->menu = $menu;
        $this->menuItems = $menuItems;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $menu = $this->menu->all();

        return view('admin.tools.menus.index', compact('menu'));
    }

    /**
     * @param Datatables $datatables
     * @return mixed
     */
    public function data(Datatables $datatables)
    {
        $query = Menu::with('items')->select('menus.*');

        return $datatables->eloquent($query)
            ->setTransformer(new MenusDataTransformer())
            ->make(true);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        return view('admin.tools.menus.create');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $menu = $this->menu->findOrFail($id);

        return view('admin.tools.menus.edit', compact('menu'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $menu = $this->menu->update($data, $id);

        return redirect()->to('admin::menus::index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $menu = $this->menu->create($data);

        return redirect()->to('admin::menus::index');
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function builder($id)
    {
        $menu = $this->menu->findOrFail($id);

        return view('admin.tools.menus.builder', compact('menu'));
    }

    /**
     * @param $menu
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_menu($menu, $id)
    {
        $deleted = $this->menuItems->delete($id);

        return redirect()
            ->route('admin::menus::builder', [$menu])
            ->with([
                'message'    => 'Successfully Deleted Menu Item.',
                'alert-type' => 'success',
            ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add_item(Request $request)
    {
        $data = $request->except(['_method', '_token']);

        $data['order'] = 1;

        $highestOrderMenuItem = $this->menuItems->getModel()->where('parent_id', '=', null)
            ->orderBy('order', 'DESC')
            ->first();

        if (!is_null($highestOrderMenuItem)) {
            $data['order'] = intval($highestOrderMenuItem->order) + 1;
        }
        $item = $this->menuItems->createOrFirst($data);
        $this->flash('success', 'Successfully Created New Menu Item.');
        return redirect()
            ->route('admin::menus::builder', [$item->menu_id]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_item(Request $request)
    {
        $id = $request->input('id');
        $data = $request->except(['id']);

        $menuItem = $this->menuItems->findOrFail($id);
        $menuItem->update($data);

        return redirect()
            ->route('admin::menus::builder', [$menuItem->menu_id])
            ->with([
                'message'    => 'Successfully Updated Menu Item.',
                'alert-type' => 'success',
            ]);
    }

    /**
     * @param Request $request
     */
    public function order_item(Request $request)
    {
        $menuItemOrder = json_decode($request->input('order'));

        $this->orderMenu($menuItemOrder, null);
    }

    /**
     * @param array $menuItems
     * @param $parentId
     */
    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = $this->menuItems->findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }

    /**
     * @param $parameters
     * @return mixed
     */
    public function delete(Request $request, $id)
    {
        $deleted = $this->menu->delete($id);

        return back();
    }
}
