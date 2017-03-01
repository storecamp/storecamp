<?php

namespace App\Core\Http\Controllers\Site;

use Illuminate\Http\Request;

/**
 * Class IndexsController.
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
        $root = app_path().'/Core/Models/';
        $files = \File::allFiles($root);

        $filesArr = [];
        foreach ($files as $file) {
            $fileName = explode('.php',$file->getBasename());
            $filesArr[] = $fileName[0];
        }
        dd($filesArr);
        return $this->view('index');
    }
}
