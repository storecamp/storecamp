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
    public $viewPathBase = 'site.orders.';
    public $errorRedirectPath = 'site::order';

    private $ordersSystem;

    /**
     * OrdersController constructor.
     * @param OrdersSystemContract $ordersSystem
     */
    public function __construct(OrdersSystemContract $ordersSystem)
    {
        $this->ordersSystem = $ordersSystem;
    }

    public function index(Request $request)
    {
        $showPersonal = true;

        return $this->view('index', compact('showPersonal'));
    }

    public function showPersonal(Request $request)
    {
        $showPersonal = true;
        $this->view('index', compact('showPersonal'));
    }
}
