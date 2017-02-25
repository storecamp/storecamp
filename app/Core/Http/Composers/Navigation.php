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
     * @var AuthManager
     */
    public $auth;
    /**
     * @var CartSystemContract
     */
    public $cartSystem;
    /**
     * Navigation constructor.
     * @param AuthManager $authManager
     * @param CartSystemContract $cartSystem
     */
    public function __construct(AuthManager $authManager, CartSystemContract $cartSystem)
    {
        $this->auth = $authManager;
        $this->cartSystem = $cartSystem;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('navigation', ['auth' => $this->auth, 'cartSystem' => $this->cartSystem]);
    }

}