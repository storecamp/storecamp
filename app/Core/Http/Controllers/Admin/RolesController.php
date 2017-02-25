<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\AccessSystemContract;
use App\Core\Repositories\PermissionRepository;
use App\Core\Repositories\RolesRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Core\Validators\Role\RolesFormRequest;
use App\Core\Validators\Role\RolesUpdateFormRequest;

/**
 * Class RolesController
 * @package App\Core\Http\Controllers
 */
class RolesController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.roles.";

    /**
     * @var string
     */
    public $errorRedirectPath = "admin/roles";

    /**
     * @var RolesRepository
     */
    protected $rolesRepository;
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    protected $accessSystem;

    /**
     * RolesController constructor.
     * @param AccessSystemContract $accessSystem
     */
    public function __construct(AccessSystemContract $accessSystem)
    {
        $this->accessSystem = $accessSystem;
        $this->rolesRepository = $accessSystem->rolesRepository;
        $this->permissionRepository = $accessSystem->permissionRepository;
        $this->middleware('isAdmin');

    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $roles = $this->accessSystem->presentRoles($data, null, ['perms']);
        $no = $roles->firstItem();

        return $this->view('index', compact('roles', 'no'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $permissions = $this->permissionRepository->all()->pluck('name', 'id');
        $selectedPerms = [];

        return $this->view('create', compact('permissions', 'selectedPerms'));
    }

    /**
     * @param RolesFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(RolesFormRequest $request)
    {
        $data = $request->all();

        $role = $this->accessSystem->createRole($data);

        return redirect('admin/roles');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $data = $request->all();
        $role = $this->accessSystem->presentRoles($data, $id);
        return $this->view('show', compact('role'));

    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $role = $this->accessSystem->presentRoles($data, $id);
            $permissions = $this->permissionRepository->all()->pluck('name', 'id');
            $selectedPerms = $role->perms()->orderBy("id")->pluck("name", "id");
            return $this->view('edit', compact('role', 'permissions', 'selectedPerms'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * @param RolesUpdateFormRequest $request
     * @param $id
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(RolesUpdateFormRequest $request, $id)
    {
        try {
            $data = $request->all();
            $this->accessSystem->updateRole($data, $id);

            return redirect('admin/roles');

        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        }
    }

    /**
     * get permissions name in json format
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getPermsJson(Request $request)
    {
        $query = $this->parserSearchValue($request->get('search'));
        $permGroup = $this->permissionRepository->getModel()->where("name", "like", $query)->select('name', 'id')->get();
        $permGroupArr = [];
        foreach ($permGroup as $key => $attrGroupItem) {
            $permGroupArr[$key]['text'] = $attrGroupItem['name'];
            $permGroupArr[$key]['id'] = $attrGroupItem['id'];
        }
        return \Response::json($permGroupArr);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->accessSystem->deleteRole($id);
            if (!$deleted) {
                \Flash::warning("Sorry role is not deleted");
            }
            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound();
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }
}
