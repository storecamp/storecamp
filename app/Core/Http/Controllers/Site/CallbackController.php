<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Http\Controllers\Controller;
use App\Core\Logic\ShopSystem;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Validator;

class CallbackController extends Controller
{
    use DispatchesJobs, ValidatesRequests;

    protected $shopSystem;

    public function __construct()
    {
    }

    /**
     * Process payment callback.
     *
     * @param Request $request
     * @param $status
     * @param $id
     * @param $shoptoken
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function process(Request $request, $status, $id, $shoptoken)
    {
        $validator = Validator::make(
            [
                'id'        => $id,
                'status'    => $status,
                'shoptoken' => $shoptoken,
            ],
            [
                'id'        => 'required|exists:'.config('sales.order_table').',id',
                'status'    => 'required|in:success,fail',
                'shoptoken' => 'required|exists:'.config('sales.transaction_table').',token,order_id,'.$id,
            ]
        );

        if ($validator->fails()) {
            abort(404);
        }

        $order = call_user_func(config('sales.order').'::find', $id);

        $transaction = $order->transactions()->where('token', $shoptoken)->first();

        ShopSystem::callback($order, $transaction, $status, $request->all());

        $transaction->token = null;

        $transaction->save();

        return redirect()->route(config('sales.callback_redirect_route'), ['order' => $order->id]);
    }
}
