<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\Models\Tools;
use App\Core\Repositories\ToolsRepository;
use App\Http\Controllers\Controller;

/**
 * Class ToolssController
 * @package App\Http\Controllers
 */
class ToolsController extends Controller {

    private $repository;

    /**
     * @param ToolsRepository $repository
     */
    public function __construct(ToolsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
