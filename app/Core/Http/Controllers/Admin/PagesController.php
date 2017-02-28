<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }
}
