<?php

namespace App\Core\Http\Controllers\Api;

use App\Core\Contracts\LogViewerSystemContract;
use App\Core\Http\Controllers\Controller;
use Arcanedev\LogViewer\Http\Controllers\LogViewerController as LogBaseController;
use Illuminate\Http\Request;

/**
 * Class LogsControllersController
 * @package App\Http\Controllers
 */
class LogsController extends LogBaseController
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
        parent::__construct(app('Arcanedev\LogViewer\Contracts\LogViewer'));
        $this->viewerSystem = $viewerSystem;
        $this->perPage = config('log-viewer.per-page', $this->perPage);
    }

    /* ------------------------------------------------------------------------------------------------
    |  Constructor
    | ------------------------------------------------------------------------------------------------
    */

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
        $data = $this->viewerSystem->dashboard();
        $stats = $data['stats'];
        $chartData = $data['chartData'];
        $percents = $data['percents'];
        $count = count($stats->rows());
        $icons = [];
        foreach ($percents as $level => $item) {
            $icons[$level] = log_styler()->icon($level);
        }
        return response()->json(compact('chartData', 'percents', 'stats', 'count', 'icons'));
    }

    /**
     * List all logs.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function listLogs(Request $request)
    {
        $data = $this->viewerSystem->showLogs($request);
        $stats = $data['stats'];
        $headers = $data['headers'];
        $rows = $data['rows'];
        $empty_logs = trans('log-viewer::general.empty-logs');
        $count = $rows->count();
        $icons = [];
        foreach ($headers as $key => $header) {
            $icons[$key] = log_styler()->icon($key) . ' ' . $header;
        }

        return response()->json(compact('headers', 'rows', 'footer', 'stats',
            'empty_logs', 'count', 'icons'));
    }

    /**
     * Show the log.
     *
     * @param string $date
     *
     * @return \Illuminate\View\View
     */
    public function show($date)
    {
        $data = $this->viewerSystem->show($date);
        $stats = $data['stats'];
        $log = $data['log'];
        $levels = $data['levels'];
        $entries = $data['entries'];
        $count = $entries->total();
        $menu = $log->menu();
        $colors = [];
        foreach ($levels as $key => $level) {
            $colors[$key] = log_styler()->color(strtolower($level));
        }
        $path = $log->getPath();
        $size = $log->size();
        $entriesTotal = $entries->total();
        $created_at = $log->createdAt();
        $updated_at = $log->updatedAt();
        $envs = [];
        foreach ($entries as $key => $entry) {
            $envs[$key] = $entry->env;
        }
        return response()->json(compact('log', 'levels', 'entries', 'stats',
            'count', 'menu', 'date', 'colors', 'path', 'size', 'entriesTotal',
            'created_at', 'updated_at', 'envs'));
    }

    /**
     * Filter the log entries by level.
     *
     * @param string $date
     * @param string $level
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showByLevel($date, $level)
    {
        $data = $this->viewerSystem->showByLevel($date, $level);
        $stats = $data['stats'];
        $log = $data['log'];

        if ($level === 'all') {
            return $this->show($date);
        }

        $levels = $data['levels'];
        $entries = $data['entries'];
        $count = $entries->total();
        $menu = $log->menu();
        $colors = [];
        foreach ($levels as $key => $level) {
            $colors[$key] = log_styler()->color(strtolower($level));
        }
        $path = $log->getPath();
        $size = $log->size();
        $entriesTotal = $entries->total();
        $created_at = $log->createdAt();
        $updated_at = $log->updatedAt();
        $envs = [];
        foreach ($entries as $key => $entry) {
            $envs[$key] = $entry->env;
        }
        return response()->json(compact('log', 'levels', 'entries', 'stats', 'count',
            'menu', 'date', 'colors', 'path', 'size', 'entriesTotal',
            'created_at', 'updated_at', 'envs'));
    }

    /**
     * Download the log.
     *
     * @param string $date
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        $deleted = $this->viewerSystem->delete($request);

        return response()->json([
            'result' => $deleted ? 'success' : 'error',
        ]);
    }
}
