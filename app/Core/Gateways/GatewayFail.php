<?php

namespace App\Core\Gateways;

/**
 * This file is part of LaravelShop,
 * A shop solution for Laravel.
 *
 * @author Alejandro Mostajo
 * @copyright Amsgames, LLC
 * @license MIT
 * @package App\Core
 */

use App\Core\Exceptions\CheckoutException;
use App\Core\Exceptions\GatewayException;
use App\Core\Exceptions\ShopException;
use App\Core\Support\PaymentGateway;
use App\Core\Models\Orders;

class GatewayFail extends PaymentGateway
{
    /**
     * Called on cart checkout.
     *
     * @param Orders $order Order.
     */
    public function onCheckout($cart)
    {
        throw new CheckoutException('Checkout failed.');
    }

    /**
     * Called by shop to charge order's amount.
     *
     * @param \App\Core\Contracts\OrdersContract $order
     * @return bool
     * @throws GatewayException
     */
    public function onCharge($order): bool
    {
        throw new GatewayException('Payment failed.');
    	return false;
    }
}