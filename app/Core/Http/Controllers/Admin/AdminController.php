<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Core\Http\Controllers\Admin
 */
class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware("role:Admin");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function htmlElements() {
        return view("admin.htmlElements.elements");
    }

    /**
     *
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view("admin.dashboard");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
