<?php

namespace App\Core\Http\Composers;

use App\Core\Contracts\CartSystemContract;
use Illuminate\View\View;

/**
 * Class Navigation.
 */
class Navigation
{
    /**
     * @var CartSystemContract
     */
    public $cartSystem;
    public $locale;

    /**
     * Navigation constructor.
     *
     * @param CartSystemContract $cartSystem
     */
    public function __construct(CartSystemContract $cartSystem)
    {
        $this->cartSystem = $cartSystem;
        $this->locale = \LaravelLocalization::getCurrentLocale();
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('navigation', ['cartSystem' => $this->cartSystem, 'locale' => $this->locale]);
    }
}
