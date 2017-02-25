<?php

namespace App\Core\Contracts;

interface ShopSystemContract
{
    /**
     * Get the currently authenticated user or null.
     *
     * @return mixed
     */
    public function user();

    /**
     * Checkout current user's cart.
     */
    public static function setGateway($gatewayKey);

    /**
     * Checkout current user's cart.
     */
    public static function getGateway();

    /**
     * Checkout current user's cart.
     *
     * @param object $cart For specific cart.
     *
     * @return bool
     */
    public static function checkout($cart = null);

    /**
     * Returns placed order.
     *
     * @param object $cart For specific cart.
     *
     * @return object
     */
    public static function placeOrder($cart = null);

    /**
     * Handles gateway callbacks.
     *
     * @param string $order  Order.
     * @param string $status Callback status
     */
    public static function callback($order, $transaction, $status, $data = null);

    /**
     * Formats any value to price format set in config.
     *
     * @param mixed $value Value to format.
     *
     * @return string
     */
    public static function format($value);

    /**
     * Retuns gateway.
     *
     * @return object
     */
    public static function gateway();

    /**
     * Retuns exception.
     *
     * @return \Exception
     */
    public static function exception();
}