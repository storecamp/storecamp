<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\ProductSystemContract;
use App\Core\Models\Product;
use App\Core\Repositories\CategoryRepository;
use App\Core\Transformers\ProductDataTransformer;
use App\Core\Validators\Product\ProductsFormRequest as Create;
use App\Core\Validators\Product\ProductsUpdateFormRequest as Update;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

/**
 * Class ProductsController.
 */
class ProductsController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;
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
     * @param ProductSystemContract $productSystem
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(ProductSystemContract $productSystem, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productSystem = $productSystem;
        $this->productRepository = $this->productSystem->productRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return $this->view('index');
    }

    /**
     * @param Datatables $datatables
     * @return mixed
     */
    public function data(Datatables $datatables)
    {
        $query = Product::with('categories');
        return $datatables->eloquent($query)
            ->setTransformer(new ProductDataTransformer())
            ->make(true);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        $chosenCategory = null;
        $preferredTag = 'gallery';

        return $this->view('create', compact('categories', 'chosenCategory', 'preferredTag'));
    }

    /**
     * @param Create $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Create $request)
    {
        try {
            $data = $request->all();
            $product = $this->productSystem->create($data);

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * @param Request $request
     * @param $id
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
     * @return Response|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        try {
            $data = $request->all();
            $product = $this->productSystem->present($data, $id, ['attributeGroupDescription', 'categories']);
            $categories = $this->categoryRepository->all();
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
     * @return Response|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Update $request, $id)
    {
        try {
            $data = $request->all();
            $this->productSystem->update($data, $id);

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $deleted = $this->productSystem->delete($id);
            if (! $deleted) {
                $this->flash('warning', 'Sorry product is not deleted');
            }

            return redirect('admin/products');
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        }
    }

    /**
     * @param Request $request
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
