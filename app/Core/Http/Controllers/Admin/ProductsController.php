<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\ProductSystemContract;
use App\Core\Models\Category;
use App\Core\Models\Product;
use App\Core\Transformers\ProductDataTransformer;
use App\Core\Validators\Product\ProductsFormRequest as Create;
use App\Core\Validators\Product\ProductsUpdateFormRequest as Update;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/**
 * Class ProductsController.
 */
class ProductsController extends BaseController
{
    /**
     * @var Category
     */
    protected $category;
    /**
     * @var string
     */
    public $viewPathBase = 'admin.products.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/products';

    /**
     * @var ProductSystemContract
     */
    protected $productSystem;
    /**
     * @var
     */
    protected $productRepository;

    /**
     * ProductsController constructor.
     *
     * @param ProductSystemContract $productSystem
     * @param Category $category
     */
    public function __construct(ProductSystemContract $productSystem, Category $category)
    {
        $this->category = $category;
        $this->productSystem = $productSystem;
        $this->productRepository = $this->productSystem->productRepository;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return $this->view('index');
    }

    /**
     * @param DataTables $datatables
     *
     * @return mixed
     */
    public function data(DataTables $datatables)
    {
        $query = Product::with('categories')->select('products.*');

        return $datatables->eloquent($query)
            ->setTransformer(new ProductDataTransformer())
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->category->all();
        $chosenCategory = null;
        $preferredTag = 'gallery';

        return $this->view('create', compact('categories', 'chosenCategory', 'preferredTag'));
    }

    /**
     * @param Create $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Create $request)
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $product = $this->productSystem->create($data);
            \DB::commit();

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();

            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            \DB::rollBack();

            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        try {
            $data = $request->all();
            $product = $this->productSystem->present($data, $id, ['media']);

            return $this->view('show', compact('product'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $product = $this->productSystem->present($data, $id, ['attributeGroupDescription', 'categories']);
            $categories = $this->category->all();
            $pictures = [];
            $chosenCategory = $product->categories->first();
            $attributesList = $product->attributeGroupDescription->pluck('name', 'id');
            $preferredTag = 'gallery';

            return $this->view('edit', compact('product', 'categories', 'pictures',
                'chosenCategory', 'attributesList', 'preferredTag'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * Update the specified article in storage.
     *
     * @param Update $request
     * @param $id
     *
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        try {
            \DB::beginTransaction();
            $data = $request->all();
            $this->productSystem->update($data, $id);
            \Db::commit();

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            \Db::rollBack();

            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            \Db::rollBack();

            return $this->redirectError($e);
        }
    }

    /**
     * Remove the specified article from storage.
     *
     * @param int $id
     *
     * @return Response|RedirectResponse
     */
    public function destroy($id)
    {
        try {
            \DB::beginTransaction();
            $deleted = $this->productSystem->delete($id);
            if (!$deleted) {
                $this->flash('warning', 'Sorry product is not deleted');
                \Db::rollBack();
            }
            \Db::commit();

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            \Db::rollBack();

            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSelect(Request $request)
    {
        if (strlen(trim($request->get('search'))) > 0) {
            $query = $this->parserSearchValue($request->get('search'));
            $products = $this->productRepository->getModel()->where('title', 'like', $query)
                ->select('title', 'id')->get();
            $productGroupArr = [];
            foreach ($products as $key => $attrGroupItem) {
                $productGroupArr[$key]['text'] = $attrGroupItem['title'];
                $productGroupArr[$key]['id'] = $attrGroupItem['id'];
            }

            return \Response::json($productGroupArr);
        } else {
            return \Response::json('enter more symbols');
        }
    }
}
