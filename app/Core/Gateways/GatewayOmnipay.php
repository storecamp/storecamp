<?php

namespace App\Core\Gateways;

use App\Core\Exceptions\CheckoutException;
use App\Core\Exceptions\GatewayException;
use App\Core\Exceptions\ShopException;
use App\Core\Models\Cart;
use App\Core\Models\Orders;
use App\Core\Support\PaymentGateway;
use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;
use Throwable;

class GatewayOmnipay extends PaymentGateway
{
    /**
     * Omnipay object gateway.
     *
     * @var object
     */
    protected $omnipay;

    /**
     * Omnipay credit card.
     *
     * @var object
     */
    protected $creditCard;

    /**
     * Flag that indicates if a credit card should be used or not.
     *
     * @var bool
     */
    public $isCreditCard = false;

    /**
     * Approval URL to redirect to.
     *
     * @var string
     */
    protected $approvalUrl = '';

    /**
     * Additional options for authorize and purchase methods.
     *
     * @var array
     */
    protected $options = [];

    /**
     * Returns paypal url for approval.
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function getApprovalUrl()
    {
        return $this->approvalUrl;
    }

    /**
     * Generic getter.
     *
     * @since 1.0.0
     *
     * @param string $property Property name.
     *
     * @return mixed
     */
    public function __get($property)
    {
        return property_exists($this, $property)
            ? $this->$property
            : null;
    }

    /**
     * Creates omnipay with a specific gateway.
     *
     * @since 1.0.0
     *
     * @param string $gatewayName Gateway name to init omnipay.
     */
    public function create(string $gatewayName)
    {
        $this->omnipay = Omnipay::create($gatewayName);
    }

    /**
     * Creates omnipay with a specific gateway.
     *
     * @since 1.0.0
     *
     * @param string $gatewayName Gateway name to init omnipay.
     */
    public function setCreditCard(array $data)
    {
        $this->creditCard = new CreditCard($data);
        $this->isCreditCard = true;
    }

    /**
     * Adds an extra option for authorization and purchase processes.
     *
     * @since 1.0.0
     *
     * @param string $key   Option key.
     * @param mixed  $value Option value.
     */
    public function addOption($key, $value)
    {
        $this->options[$key] = $value;
    }

    /**
     * Called on cart checkout.
     *
     * @since 1.0.0
     *
     * @param Cart $cart Cart.
     */
    public function onCheckout($cart)
    {
        if (!isset($this->omnipay)) {
            throw new ShopException('Omnipay gateway not set.', 0);
        }
        if ($this->isCreditCard && !isset($this->creditCard)) {
            throw new GatewayException('Credit Card not set.', 1);
        }
        try {
            $response = $this->omnipay->authorize(array_merge([
                'amount'    => $cart->total,
                'currency'  => config('sales.currency'),
                'card'      => $this->isCreditCard ? $this->creditCard : [],
                'returnUrl' => $this->callbackSuccess,
            ], $this->options))->send();

            if (!$response->isSuccessful()) {
                throw new CheckoutException($response->getMessage(), 1);
            }
        } catch (Throwable $e) {
            throw new CheckoutException(
                'Exception caught while attempting authorize.'."\n".
                $e->getMessage(),
                1
            );
        }
    }

    /**
     * Called by sales to charge order's amount.
     *
     * @since 1.0.0
     *
     * @param \App\Core\Contracts\OrdersSystemContract $order
     *
     * @throws ShopException
     *
     * @return bool
     */
    public function onCharge($order)
    {
        if (!isset($this->omnipay)) {
            throw new ShopException('Omnipay gateway not set.', 0);
        }
        try {
            $response = $this->omnipay->purchase(array_merge([
                'amount'    => $order->total,
                'currency'  => config('sales.currency'),
                'card'      => $this->isCreditCard ? $this->creditCard : [],
                'returnUrl' => $this->callbackSuccess,
                'cancelUrl' => $this->callbackFail,
            ], $this->options))->send();

            if ($response->isSuccessful()) {
                $this->transactionId = $response->getTransactionReference();

                $this->detail = 'Success';
            } elseif ($response->isRedirect()) {
                $this->statusCode = 'pending';

                $this->approvalUrl = $response->getRedirectUrl();

                $this->detail = sprintf('Pending approval: %s', $response->getRedirectUrl());
            } else {
                throw new GatewayException($response->getMessage(), 1);
            }

            return true;
        } catch (Throwable $e) {
            throw new ShopException(
                $e->getMessage(),
                1000,
                $e
            );
        }

        return false;
    }

    /**
     * @param Orders $order
     * @param null   $data
     *
     * @throws GatewayException
     */
    public function onCallbackSuccess($order, $data = null)
    {
        try {
            $response = $this->omnipay->completePurchase([
                'transactionId' => $order->transactionId,
            ])->send();

            if ($response->isSuccessful()) {
                $this->statusCode = 'completed';

                $this->transactionId = $this->omnipay->getTransactionId();

                $this->detail = 'Success';
            } else {
                throw new GatewayException($response->getMessage(), 1);
            }
        } catch (\Throwable $e) {
            throw new GatewayException(
                $e->getMessage(),
                1000,
                $e
            );
        }
    }
}
