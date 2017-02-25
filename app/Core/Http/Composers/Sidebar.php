<?php

namespace App\Core\Http\Composers;

use App\Core\Repositories\CategoryRepository;
use Illuminate\View\View;

class Sidebar
{
    protected $categoryRepository;

    /**
     * Sidebar constructor.
     * @param $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param View $view
     * @return View
     */
    public function compose(View $view)
    {
        return $view->with('categories', $this->categoryRepository->with('children')->all());
    }
}