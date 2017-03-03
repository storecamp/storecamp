<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\ProductSystemContract;
use App\Core\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class ProductsController.
 */
class ProductController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'site.product.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'site::products::index';

    /**
     * @var ProductSystemContract
     */
    private $productSystem;
    /**
     * @var
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductSystemContract $productSystem
     */
    public function __construct(ProductSystemContract $productSystem)
    {
        $this->productSystem = $productSystem;
        $this->productRepository = $productSystem->productRepository;
    }

    /**
     * @param Request $request
     * @param null $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request, $category = null)
    {
        try {
            $data = $request->all();
            if ($category) {
                $products = $this->productSystem->categorized($data, $category, ['media']);
                $categoryInstance = app('App\\Core\\Repositories\\CategoryRepository');
                $category = $categoryInstance->find($category);
            } else {
                $products = $this->productSystem->present($data, null, ['media']);
            }

            return $this->view('index', compact('products', 'category'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }


    /**
     * @param Request $request
     * @param $productId
     * @return \Illuminate\View\View|RedirectResponse
     */
    public function show(Request $request, $productId)
    {
        try {
            $data = $request->all();
            $product = $this->productSystem->present($data, $productId, ['categories', 'productReview', 'media']);
            $mostViewed = $this->productRepository->mostViewed(5)->model->get();
            $category = $product->categories->first();
            $product->view();
            return $this->view('show', compact('product', 'category', 'mostViewed'));
        } catch (ModelNotFoundException $e) {
            return $this->redirectNotFound($e);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }
    }
}
