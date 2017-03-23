<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\CartSystemContract;
use Illuminate\Http\Request;

/**
 * Class CartsController.
 */
class CartController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'site.cart.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'site::';
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
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        try {
            $data = $request->all();
            $cart = $this->cartSystem->setCurrency(config('sales.currency'))->show($data);
            $cartSystem = $this->cartSystem;

            return $this->view('show', compact('cart', 'cartSystem'));
        } catch (\Throwable $exception) {
            return $this->redirectError($exception);
        }
    }

    /**
     * @param Request $request
     * @param $rowId
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $rowId)
    {
        try {
            $this->cartSystem->update($rowId, $request->get('quantity'));
            if ($request->ajax()) {
                return response()->json(['message' => 'cart item updated']);
            } else {
                $this->flash('success', 'cart item updated');

                return redirect()->route('site::cart::show');
            }
        } catch (\Throwable $exception) {
            return $this->redirectError($exception);
        }
    }

    /**
     * @param Request $request
     * @param $productId
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, $productId)
    {
        try {
            $data = $request->all();
            $cart = $this->cartSystem->addItem($data, $productId);
            if ($request->ajax()) {
                $this->flash('success', 'item added to cart');

                return response()->json(['cart' => json_encode($cart)]);
            } else {
                return redirect()->route('site::cart::show');
            }
        } catch (\Throwable $exception) {
            return $this->redirectError($exception);
        }
    }

    /**
     * @param Request $request
     * @param $itemId
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function remove(Request $request, $itemId)
    {
        $this->cartSystem->remove($itemId);
        if ($request->ajax()) {
            return response()->json(['message' => 'cart item deleted'], 200);
        } else {
            $this->flash('warning', 'item deleted from cart');

            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $this->cartSystem->destroy();
        if ($request->ajax()) {
            return response()->json(['message' => 'cart deleted'], 200);
        } else {
            $this->flash('warning', 'cart cleared completely');

            return redirect()->back();
        }
    }
}
