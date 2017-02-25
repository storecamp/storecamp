<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SettingsController extends BaseController
{
    /**
     * SettingsController constructor.
     */
    public function __construct()
    {
        $this->middleware(["role:Admin"]);
    }

    /**
     * Settings Page.
     *
     * @return \Response
     */
    public function settings()
    {
        if (! defined('STDIN')) {
            $stdin = fopen("php://stdin", "r");
        }
        return view('settings');
    }
    /**
     * Reinstall the application.
     *
     * @return mixed
     */
    public function reinstall()
    {
        \Artisan::call('migrate:reset');
        \Artisan::call('db:seed');
        return redirect('settings')->with(\Flash::info('Reinstalled success!'));
    }
    /**
     * Clear the application cache.
     *
     * @return mixed
     */
    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return redirect('settings')->with(\Flash::info('Application cache cleared!'));
    }
}
