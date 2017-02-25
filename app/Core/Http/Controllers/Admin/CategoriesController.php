<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\CategorySystemContract;
use App\Core\Validators\Category\CategoriesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Core\Repositories\CategoryRepository;
use App\Core\Validators\Category\CategoriesUpdateFormRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * Class CategoriesController
 * @package App\Core\Http\Controllers
 */
class CategoriesController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = "admin.categories.";
    /**
     * @var string
     */
    public $errorRedirectPath = "admin/categories";

    /**
     * @var CategoryRepository
     */
    protected $repository;

    /**
     * @var CategorySystemContract
     */
    protected $categorySystem;

    /**
     * CategoriesController constructor.
     * @param CategorySystemContract $categorySystem
     */
    public function __construct(CategorySystemContract $categorySystem)
    {
        $this->categorySystem = $categorySystem;
        $this->repository = $this->categorySystem->categoryRepository;

        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of categories
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $request->all();
        $categories = $this->categorySystem->present($data, null, ['parent', 'children', 'media']);
        $no = $categories->firstItem();

        return $this->view('index', compact('categories', 'no'));
    }

    /**
     * Show the form for creating a new category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $categories = $this->repository->with(['parent', 'children'])->all();
        $parent = null;
        $preferredTag = "thumbnail";

        return $this->view('create', compact('categories', 'parent', 'preferredTag'));
    }

    /**
     * @param CategoriesFormRequest $request
     * @return \Illuminate\Http\RedirectResponse|Redirect
     */
    public function store(CategoriesFormRequest $request)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->create($data);
            return redirect('admin/categories');
        } catch (\Throwable $exception) {
            return $this->redirectError($exception);
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     * @return Response|Redirect
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->present($data, $id, ['media']);
            $categories = $this->repository->all();
            return $this->view('show', compact('category', 'categories'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * get category description for json
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDescription($id)
    {
        try {
            $category = $this->repository->find($id);
            $description = $category->description;
            return response()->json($description);
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
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
            $category = $this->categorySystem->present($data, $id, ['media', 'parent']);
            $parent = $category->parent;
            $categories = $this->repository->with('parent')->all();
            $preferredTag = "thumbnail";
            return $this->view('edit', compact('category', 'parent', 'categories', 'preferredTag'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param CategoriesUpdateFormRequest $request
     * @param $id
     * @return Response|Redirect
     */
    public function update(CategoriesUpdateFormRequest $request, $id)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->update($data, $id);
            return redirect('admin/categories');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * Remove the specified category from storage.
     *
     * @param $id
     * @return Response|Redirect
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->categorySystem->delete($id);
            if (!$deleted) {
                \Flash::warning("Sorry category is not deleted");
            }
            return redirect('admin/categories');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }
}
