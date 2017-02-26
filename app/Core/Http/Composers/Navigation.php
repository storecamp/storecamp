<?php

namespace App\Core\Http\Composers;

use App\Core\Contracts\CartSystemContract;
use Illuminate\Auth\AuthManager;
use Illuminate\View\View;

/**
 * Class Navigation
 * @package App\Core\Http\Composers
 */
class Navigation
{
    /**
     * @var CartSystemContract
     */
    public $cartSystem;

    /**
     * Navigation constructor.
     * @param CartSystemContract $cartSystem
     */
    public function __construct(CartSystemContract $cartSystem)
    {
        $this->cartSystem = $cartSystem;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('navigation', ['cartSystem' => $this->cartSystem]);
    }

}