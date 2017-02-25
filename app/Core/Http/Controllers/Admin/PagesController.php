<?php

namespace App\Core\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;

use App\Core\Http\Requests;
use App\Core\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Redirect;

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
