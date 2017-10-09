<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\CategorySystemContract;
use App\Core\Models\Category;
use App\Core\Repositories\CategoryRepository;
use App\Core\Transformers\CategoriesDataTransformer;
use App\Core\Validators\Category\CategoriesFormRequest;
use App\Core\Validators\Category\CategoriesUpdateFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Yajra\DataTables\DataTables;

/**
 * Class CategoriesController.
 */
class CategoriesController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.categories.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/categories';

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
     *
     * @param CategorySystemContract $categorySystem
     */
    public function __construct(CategorySystemContract $categorySystem)
    {
        $this->categorySystem = $categorySystem;
        $this->repository = $this->categorySystem->categoryRepository;

        $this->middleware('role:Admin');
    }

    /**
     * Display a listing of categories.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return $this->view('index', compact('categories', 'no'));
    }

    /**
     * @param DataTables $datatables
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(DataTables $datatables)
    {
        $query = Category::with(['media']);

        return $datatables->eloquent($query)
            ->setTransformer(new CategoriesDataTransformer())
            ->make(true);
    }

    /**
     * Show the form for creating a new category.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $categories = $this->repository->with(['parent', 'children'])->all();
        $parent = null;
        $preferredTag = 'thumbnail';

        return $this->view('create', compact('categories', 'parent', 'preferredTag'));
    }

    /**
     * @param CategoriesFormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|Redirect
     */
    public function store(CategoriesFormRequest $request)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->create($data);
        } catch (\Throwable $exception) {
            return $this->redirectError($exception);
        }

        return redirect('admin/categories');
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|Redirect|\Illuminate\View\View
     * @return RedirectResponse|Response
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->present($data, $id, ['media']);
            $categories = $this->repository->all();
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }

        return $this->view('show', compact('category', 'categories'));
    }

    /**
     * get category description for json.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDescription($id)
    {
        try {
            $category = $this->repository->find($id);
            $description = $category->description;
        } catch (ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }

        return response()->json($description);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->present($data, $id, ['media', 'parent']);
            $parent = $category->parent;
            $categories = $this->repository->with('parent')->all();
            $preferredTag = 'thumbnail';
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }

        return $this->view('edit', compact('category', 'parent', 'categories', 'preferredTag'));
    }

    /**
     * @param CategoriesUpdateFormRequest $request
     * @param $id
     *
     * @return RedirectResponse|Response
     */
    public function update(CategoriesUpdateFormRequest $request, $id)
    {
        try {
            $data = $request->all();
            $category = $this->categorySystem->update($data, $id);
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }

        return redirect('admin/categories');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param $id
     *
     * @return RedirectResponse|Redirect
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->categorySystem->delete($id);
            if (!$deleted) {
                $this->flash('warning', 'Sorry category is not deleted');
            }
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }

        return redirect('admin/categories');
    }
}
