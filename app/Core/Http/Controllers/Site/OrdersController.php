<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\OrdersSystemContract;
use App\Core\Logic\OrdersSystem;
use App\Core\Models\Orders;
use Illuminate\Http\Request;

/**
 * Class OrderssController.
 */
class OrdersController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'site.orders.';
    /**
     * @var string
     */
    public $errorRedirectPath = 'site::order';

    /**
     * @var OrdersSystemContract
     */
    private $ordersSystem;

    /**
     * @var array
     */
    private $statuses;

    /**
     * OrdersController constructor.
     * @param OrdersSystemContract $ordersSystem
     */
    public function __construct(OrdersSystemContract $ordersSystem)
    {
        $this->ordersSystem = $ordersSystem;
        $this->statuses = ['showPersonal', 'showAddress', 'showShipping', 'showPayment'];
    }

    /**
     * @param Request $request
     * @param string $status
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $status = null): \Illuminate\View\View
    {
        if (! in_array($status, $this->statuses)) {
            if (\Auth::check()) {
                $status = 'showAddress';
            } else {
                $status = 'showPersonal';
            }
        }
        $getAllPreviousValue = getAllPreviousValues($status, $this->statuses);
        if (! $getAllPreviousValue) {
            $getAllPreviousValue = [];
        }

        return $this->view('index', compact('status', 'getAllPreviousValue'));
    }

    /**
     * @param Request $request
     */
    public function createPersonal(Request $request)
    {
    }

    /**
     * @param Request $request
     */
    public function createAddress(Request $request)
    {
    }

    /**
     * @param Request $request
     */
    public function createShipping(Request $request)
    {
    }

    /**
     * @param Request $request
     */
    public function createPayment(Request $request)
    {
    }
}
