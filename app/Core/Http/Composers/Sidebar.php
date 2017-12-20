<?php

namespace App\Core\Http\Composers;

use Illuminate\View\View;

class Sidebar
{
    protected $category;

    /**
     * Sidebar constructor.
     *
     * @param $category
     */
    public function __construct(\App\Core\Models\Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param View $view
     *
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('categories', $this->category->all()->load('children'));
    }
}
