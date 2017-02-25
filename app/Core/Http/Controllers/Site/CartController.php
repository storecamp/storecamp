<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\CartSystemContract;
use Illuminate\Http\Request;

/**
 * Class CartsController
 * @package App\Core\Http\Controllers
 */
class CartController extends BaseController
{
    /**
     * TODO Implement Try Catch blocks
     */
    /**
     * @var string
     */
    public $viewPathBase = "site.cart.";
    /**
     * @var string
     */
    public $errorRedirectPath = "site.cart";
    /**
     * @var CartSystemContract
     */
    private $cartSystem;

    /**
     * CartController constructor.
     *
     * @param CartSystemContract $cartSystem
     */
    public function __construct(CartSystemContract $cartSystem)
    {
        $this->cartSystem = $cartSystem;
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $data = $request->all();
        $cart = $this->cartSystem->setCurrency(config('cart.main_currency'))->show($data);
        $cartSystem = $this->cartSystem;
        return $this->view('show', compact('cart', 'cartSystem'));
    }

    /**
     * @param Request $request
     * @param $rowId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $rowId)
    {
        $this->cartSystem->update($rowId, $request->get('quantity'));
        if($request->ajax()) {
            return response()->json(['message'=> 'cart item updated']);
        } else {
            \Flash::success('cart item updated');
            return redirect()->route('site::cart::show');
        }
    }

    /**
     * @param Request $request
     * @param $productId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $productId)
    {
        $data = $request->all();
        $cart = $this->cartSystem->addItem($data, $productId);
        if($request->ajax()) {
            \Flash::success('item added to cart');
            return response()->json(['cart'=> json_encode($cart)]);
        } else {
            return redirect()->route('site::cart::show');
        }
    }

    /**
     * @param Request $request
     * @param $itemId
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function remove(Request $request, $itemId)
    {
        $this->cartSystem->remove($itemId);
        if($request->ajax()) {
            return response()->json(['message' => 'cart item deleted'], 200);
        } else {
            \Flash::warning('item deleted from cart');
            return redirect()->back();
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->cartSystem->destroy();
        if($request->ajax()) {
            return response()->json(['message'=> 'cart deleted'], 200);
        } else {
            \Flash::warning('cart cleared completely');
            return redirect()->back();
        }
    }


}
