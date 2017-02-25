<?php

namespace App\Core\Http\Controllers\Site;

use Illuminate\Http\Request;

/**
 * Class IndexsController
 * @package App\Http\Controllers
 */
class IndexController extends BaseController
{
    public $viewPathBase = 'site.home.';
    public $errorRedirectPath = 'site::';

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {
        return $this->view('index');
    }
}
