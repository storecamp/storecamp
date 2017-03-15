<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Contracts\OrdersSystemContract;
use App\Core\Support\OrderSteps\OrderStepItem;
use App\Core\Support\OrderSteps\OrderSteps;
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
     *
     * @param OrdersSystemContract $ordersSystem
     */
    public function __construct(OrdersSystemContract $ordersSystem)
    {
        $this->middleware(['cartEmpty']);
        $this->ordersSystem = $ordersSystem;
        $this->statuses = ['showPersonal', 'showAddress', 'showShipping', 'showPayment'];
    }

    /**
     * @param Request $request
     * @param string  $status
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, string $status = null): \Illuminate\View\View
    {
        $orderSteps = new OrderStepItem();
        $statuses = $orderSteps->steps->all();
        $status = $orderSteps->getWhereNotActive();

        $getAllPreviousValue = getAllPreviousValues($status['step'], OrderSteps::STEPS);
        if (!$getAllPreviousValue) {
            $getAllPreviousValue = [];
        }
        $status = $status['step'];

        return $this->view('index', compact('status', 'getAllPreviousValue'));
    }

    /**
     * @param Request $request
     * @param string $step
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makeStepPassed(Request $request, string $step)
    {
        try {
            $orderSteps = new OrderStepItem();
            $statuses = $orderSteps->makeStepPassed($step);
        } catch (\Throwable $e) {
            return $this->redirectError($e);
        }

        return redirect()->route('site::order::index');
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
