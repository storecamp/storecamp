<?php

namespace App\Core\Http\Composers;

use Illuminate\Auth\AuthManager;
use Illuminate\View\View;

class AdminNavigation
{
    public $auth;
    public $locale;

    /**
     * AdminNavigation constructor.
     *
     * @param AuthManager $authManager
     */
    public function __construct(AuthManager $authManager)
    {
        $this->auth = $authManager;
        $this->locale = \LaravelLocalization::getCurrentLocale();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('navigation', ['auth' => $this->auth, 'locale' => $this->locale]);
    }
}
