<?php

namespace App\Core\Http\Composers;


use Illuminate\Auth\AuthManager;
use Illuminate\View\View;

class Auth
{
    /**
     * @var AuthManager
     */
    public $auth;

    /**
     * Site constructor.
     * @param AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('auth', $this->auth);
    }
}