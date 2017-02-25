<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\UsersSystemContract;
use App\Core\Repositories\RolesRepository;
use Illuminate\Http\Request;
use App\Core\Repositories\UserRepository;
use App\Core\Validators\User\UsersUpdateFormRequest;
use App\Core\Validators\User\UsersFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class UsersController
 * @package App\Core\Http\Controllers
 */
class UsersController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.users.";
    /**
     * @var string
     */
    public $errorRedirectPath = "admin/users";

    /**
     * @var UsersSystemContract
     */
    protected $usersSystem;
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var RolesRepository
     */
    protected $rolesRepository;

    /**
     * UsersController constructor.
     * @param UsersSystemContract $usersSystem
     */
    public function __construct(UsersSystemContract $usersSystem)
    {
        $this->usersSystem = $usersSystem;
        $this->userRepository = $usersSystem->userRepository;
        $this->rolesRepository = $usersSystem->rolesRepository;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $users = $this->usersSystem->present($data);
        $no = $users->firstItem();

        return $this->view('index', compact('users', 'no'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = $this->rolesRepository->all()->pluck('name', 'id');
        return $this->view('create', compact('roles'));
    }

    /**
     * @param UsersFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UsersFormRequest $request)
    {
        try {
            $data = $request->all();
            $user = $this->usersSystem->create($data);
            return redirect('admin/users');
        } catch (\Exception $exception) {
            \Flash::error($exception->getCode(), $exception->getMessage());
            return redirect()->to($this->errorRedirectPath)->withErrors($exception);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $user = $this->usersSystem->present($data, $id);
            $role = $user->getRole();
            return $this->view('show', compact('user', 'role'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
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
            $user = $this->usersSystem->present($data, $id);
            $roles = $this->rolesRepository->all()->pluck('name', 'id');
            $roleEntity = $user->getRole();
            $role['name'] = $roleEntity->name;
            $role['id'] = $roleEntity->id;

            return $this->view('edit', compact('user', 'roles', 'role'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param UsersUpdateFormRequest $request
     * @param $id
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UsersUpdateFormRequest $request, $id)
    {
        try {
            $data = !$request->has('password') ? $request->except('password') : $request->all();
            $user = $this->usersSystem->update($data, $id);
            return redirect('admin/users');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Exception $exception) {
            \Flash::error($exception->getCode(), $exception->getMessage());
            return redirect()->to($this->errorRedirectPath)->withErrors($exception);
        }
    }

    /**
     * @param $id
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->usersSystem->delete($id);
            if (!$deleted) {
                \Flash::warning("Sorry user is not deleted");
            }
            return redirect('admin/users');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }
}
