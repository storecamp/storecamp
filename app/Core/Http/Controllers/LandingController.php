<?php

namespace App\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LandingController extends Controller
{

    public function index() {
        return view('welcome');
    }
}
