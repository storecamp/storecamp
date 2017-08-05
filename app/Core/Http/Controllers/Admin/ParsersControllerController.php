<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Parsers\Rozetka\Rozetka;
use App\Core\Repositories\ParserRepository;
use Illuminate\Http\Request;

/**
 * Class ParsersControllersController.
 */
class ParsersControllerController extends BaseController
{
    /**
     * @var string
     */
    public $viewPathBase = 'admin.parsers.';

    /**
     * @var string
     */
    public $errorRedirectPath = 'admin/parsers';

    /**
     * @var ParserRepository
     */
    private $repository;

    /**
     * ParsersControllerController constructor.
     *
     * @param ParserRepository $repository
     */
    public function __construct(ParserRepository $repository)
    {
        $this->repository = $repository;
        $this->middleware('role:Admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $this->repository->all();

        return $this->view('index', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, $id)
    {
        $data = $this->repository->findOrFail($id);

        return $this->view('show', compact('data'));
    }

    /**
     * Parse the resource.
     *
     * @return Response
     */
    public function parse(Request $request, $id)
    {
        $model = $this->repository->findOrFail($id);
        $keyword = $request->get('keyword');
        $pagelimit = $request->get('pagelimit');
        $newsearch = new Rozetka($model, $pagelimit ? $pagelimit : 1);
        $result = $newsearch->parse($keyword);
        if ($result) {
            $this->toastr('success', 'Data stored in a file in parsers folder with name: '.'<b>'.$result.'.csv'.'</b>');

            return redirect()->back();
        } else {
            $this->toastr('error', 'Error appeared!');

            return redirect()->back();
        }
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
