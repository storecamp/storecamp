<?php

namespace App\Core\Http\Composers;


use Illuminate\Auth\AuthManager;
use Illuminate\View\View;

class AdminNavigation
{
    public $auth;

    /**
     * AdminNavigation constructor.
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('auth', $this->auth);
    }
}