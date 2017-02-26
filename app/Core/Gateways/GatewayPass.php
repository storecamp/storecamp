<?php

namespace App\Core\Gateways;

use App\Core\Models\Orders;
use App\Core\Support\PaymentGateway;

class GatewayPass extends PaymentGateway
{
    /**
     * Called by shop to charge order's amount.
     *
     * @param Orders $order.
     *
     * @return bool
     */
    public function onCharge($order)
    {
        $this->transactionId = uniqid();
    	return true;
    }
}