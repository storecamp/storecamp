<?php

namespace App\Core\Contracts;


interface CartItemInterface
{

    /**
     * One-to-One relations with the user model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user();

    /**
     * One-to-One relations with the cart model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cart();

    /**
     * One-to-One relations with Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function order();

    /**
     * Returns flag indicating if item has an object.
     *
     * @return bool
     */
    public function getHasObjectAttribute();

    /**
     * Returns attached object.
     *
     * @return mixed
     */
    public function getObjectAttribute();
    
    /**
     * Returns item name.
     *
     * @return string
     */
    public function getDisplayNameAttribute();

    /**
     * Returns shop it.
     *
     * @return mixed
     */
    public function getShopIdAttribute();

    /**
     * Returns formatted price for display.
     *
     * @return string
     */
    public function getDisplayPriceAttribute();

    /**
     * Returns formatted tax for display.
     *
     * @return string
     */
    public function getDisplayTaxAttribute();

    /**
     * Returns formatted tax for display.
     *
     * @return string
     */
    public function getDisplayShippingAttribute();

    /**
     * Returns flag indicating if item was purchased by user.
     *
     * @return bool
     */
    public function getWasPurchasedAttribute();

}