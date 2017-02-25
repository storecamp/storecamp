<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Contracts\LogViewerSystemContract;
use Illuminate\Http\Request;

use Arcanedev\LogViewer\Http\Controllers\Controller as LogBaseController;

class LogViewerController extends LogBaseController
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    protected $perPage = 30;

    protected $viewerSystem;

    protected $showRoute = 'log-viewer::logs.show';
    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    public function __construct(LogViewerSystemContract $viewerSystem)
    {
        parent::__construct();
        $this->viewerSystem = $viewerSystem;
        $this->perPage = config('log-viewer.per-page', $this->perPage);
    }

    public function view($view, $data = [], $mergeData = [])
    {
        return view('admin.logs.' . $view, $data, $mergeData);
    }
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data     = $this->viewerSystem->dashboard();
        $stats     = $data['stats'];
        $chartData = $data['chartData'];
        $percents  = $data['percents'];

        return $this->view('dashboard', compact('chartData', 'percents', 'stats'));
    }

    /**
     * List all logs.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function listLogs(Request $request)
    {
        $data     = $this->viewerSystem->showLogs($request);
        $stats   = $data['stats'];
        $headers = $data['headers'];
        $rows    = $data['rows'];

        return $this->view('logs', compact('headers', 'rows', 'footer', 'stats'));
    }

    /**
     * Show the log.
     *
     * @param  string  $date
     *
     * @return \Illuminate\View\View
     */
    public function show($date)
    {
        $data     = $this->viewerSystem->show($date);
        $stats   = $data['stats'];
        $log     = $data['log'];
        $levels  = $data['levels'];
        $entries =  $data['entries'];
        return $this->view('show', compact('log', 'levels', 'entries', 'stats'));
    }

    /**
     * Filter the log entries by level.
     *
     * @param  string  $date
     * @param  string  $level
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showByLevel($date, $level)
    {
        $data = $this->viewerSystem->showByLevel($date, $level);

        $stats = $data['stats'];
        $log = $data['log'];

        if ($level === 'all') {
            return redirect()->route($this->showRoute, [$date]);
        }

        $levels = $data['levels'];
        $entries = $data['entries'];

        return $this->view('show', compact('log', 'levels', 'entries', 'stats'));
    }

    /**
     * Download the log
     *
     * @param  string  $date
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($date)
    {
        $download = $this->viewerSystem->download($date);

        return $download;
    }

    /**
     * Delete a log.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        if ( ! $request->ajax())
            abort(405, 'Method Not Allowed');

        $deleted =  $this->viewerSystem->delete($request);

        return response()->json([
            'result' => $deleted ? 'success' : 'error'
        ]);
    }
}
