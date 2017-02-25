<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\Models\Moderation;
use App\Core\Repositories\ModerationRepository;
use App\Core\Http\Controllers\Controller;

/**
 * Class ModerationsController
 * @package App\Core\Http\Controllers
 */
class ModerationController extends Controller {

    private $repository;

    /**
     * @param ModerationRepository $repository
     */
    public function __construct(ModerationRepository $repository)
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
