<?php

namespace App\Core\Http\Controllers;

use App\Drivers\FolderToDb\SynchronizerInterface;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Core\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return redirect()->to('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {
        return view('landing');
    }
    
}
