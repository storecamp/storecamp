<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

abstract class BaseController extends Controller
{
    public $viewPathBase = 'admin.';
    public $errorRedirectPath = 'admin';

    /**
     * @param $type
     * @param $message
     */
    public function flash($type, $message)
    {
        $flash = app('\Laracasts\Flash\FlashNotifier');
        $flash->{$type}($message);
    }

    /**
     * @param $view
     * @param array $data
     * @param array $mergeData
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function view($view, array $data = [], array $mergeData = []): View
    {
        return view($this->viewPathBase . $view, $data, $mergeData);
    }

    /**
     * @param $e
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectNotFound($e = null): RedirectResponse
    {
        if (isset($e)) {
            $this->flash('error', 'Not Found! Server message is - ' . $e->getMessage() . ' and code is - ' . $e->getCode());

            return redirect($this->errorRedirectPath);
        } else {
            $this->flash('error','Sorry Item Not Found!');
            return redirect($this->errorRedirectPath);
        }
    }

    /**
     * @param $e
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectError($e = null): RedirectResponse
    {
        if (isset($e)) {
            if (request()->ajax()) {
                return response()->json('Error appeared! Server message is - ' . $e->getMessage() . ' and code is - ' . $e->getCode(), $e->getCode());
            }
            $this->flash('error', 'Error appeared! Server message is - ' .'<b>'. $e->getMessage() . '</b>' .' and code is - ' .'<b>'. $e->getCode(). '</b>');
            return redirect($this->errorRedirectPath);
        } else {
            if (request()->ajax()) {
                return response()->json('Sorry Error found!', 404);
            }
            $this->flash('error','Sorry Error found!');
            return redirect($this->errorRedirectPath);
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
            return;
        }
        return '%' . trim($search) . '%';
    }
}
