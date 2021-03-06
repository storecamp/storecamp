<?php

namespace App\Core\Gateways;

use App\Core\Models\Orders;

class GatewayCallback extends GatewayPass
{
    /**
     * For callback uses.
     */
    protected $didCallback = false;

    /**
     * Called by shop to charge order's amount.
     *
     * @param Orders $order Orders.
     *
     * @return bool
     */
    public function onCharge($order)
    {
        $this->statusCode = 'pending';
        $this->detail = 'pending response, token:'.$this->token;

        return parent::onCharge($order);
    }

    /**
     * Called on callback.
     *
     * @param Orders $order Orders.
     * @param mixed  $data  Request input from callback.
     *
     * @return bool
     */
    public function onCallbackSuccess($order, $data = null)
    {
        $this->statusCode = 'completed';
        $this->detail = 'success callback';
        $this->didCallback = true;
    }

    /**
     * Called on callback.
     *
     * @param Orders $order Orders.
     * @param mixed  $data  Request input from callback.
     *
     * @return bool
     */
    public function onCallbackFail($order, $data = null)
    {
        $this->statusCode = 'failed';
        $this->detail = 'failed callback';
        $this->didCallback = true;
    }

    /**
     * Returns successful callback URL.
     *
     * @return false
     */
    public function getCallbackSuccess()
    {
        return $this->callbackSuccess;
    }

    /**
     * Returns fail callback URL.
     *
     * @return false
     */
    public function getCallbackFail()
    {
        return $this->callbackFail;
    }

    /**
     * Returns successful callback URL.
     *
     * @return false
     */
    public function getDidCallback()
    {
        return $this->didCallback;
    }
}
