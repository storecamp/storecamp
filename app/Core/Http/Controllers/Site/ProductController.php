<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\ProductSystemContract;
use Illuminate\Http\Request;
use App\Core\Models\Product;
use App\Core\Repositories\ProductsRepository;

/**
 * Class ProductsController
 * @package App\Core\Http\Controllers
 */
class ProductController extends BaseController
{
    public $viewPathBase = "site.product.";
    public $errorRedirectPath = "site::products";

    private $productSystem;
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

    public function index(Request $request, $category = null)
    {
        $data = $request->all();
        if ($category) {
            $products = $this->productSystem->categorized($data, $category, []);
            $categoryInstance = app("App\\Core\\Repositories\\CategoryRepository");
            $category = $categoryInstance->find($category);
        } else {
            $products = $this->productSystem->present($data, null);
        }
        return $this->view('index', compact('products', 'category'));
    }

    /**
     * @param Request $request
     * @param $productId
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $productId)
    {
        $data = $request->all();
        $product = $this->productSystem->present($data, $productId, ['categories', 'productReview']);
        $category = $product->categories->first();
        return $this->view('show', compact('product', 'category'));
    }
}
