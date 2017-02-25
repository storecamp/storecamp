<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

abstract class BaseController extends Controller
{
    public $viewPathBase = "admin.";
    public $errorRedirectPath = "admin";

    /**
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, array $data = [], array $mergeData = []) : View
    {
        return view($this->viewPathBase . $view, $data, $mergeData);
    }

    /**
     * @param $e
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectNotFound($e = null) : RedirectResponse
    {
        if (isset($e)) {
            \Flash::error('Not Found! Server message is - ' . $e->getMessage() . ' and code is - ' . $e->getCode());
            return redirect($this->errorRedirectPath);
        } else {
            return redirect($this->errorRedirectPath)
                ->with(\Flash::error('Sorry Item Not Found!'));
        }
    }

    /**
     * @param $e
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectError($e = null) : RedirectResponse
    {
        if (isset($e)) {
            if(request()->ajax()) {
                return response()->json('Error appeared! Server message is - ' . $e->getMessage() . ' and code is - ' . $e->getCode(), $e->getCode());
            }
            \Flash::error('Error appeared! Server message is - ' . $e->getMessage() . ' and code is - ' . $e->getCode());
            return redirect($this->errorRedirectPath);
        } else {
            if(request()->ajax()) {
                return response()->json('Sorry Error found!', 404);
            }
            return redirect($this->errorRedirectPath)
                ->with(\Flash::error('Sorry Error found!'));
        }
    }

    /**
     * @param $search
     * @return null
     */
    protected function parserSearchValue($search)
    {

        if (stripos($search, ';') || stripos($search, ':')) {
            $values = explode(';', $search);
            foreach ($values as $value) {
                $s = explode(':', $value);
                if (count($s) == 1) {
                    return $s[0];
                }
            }

            return null;
        }

        return '%'.trim($search).'%';
    }

}
