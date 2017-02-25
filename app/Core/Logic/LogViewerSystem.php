<?php

namespace App\Core\Logic;


use App\Core\Contracts\LogViewerSystemContract;
use Arcanedev\LogViewer\Exceptions\LogNotFoundException;
use Arcanedev\LogViewer\Tables\StatsTable;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

/**
 * Class LogViewerSystem
 * @package App\Core\Logic
 */
class LogViewerSystem implements LogViewerSystemContract
{
    /**
     * @var int
     */
    protected $perPage = 30;

    /**
     * The log viewer instance
     *
     * @var \Arcanedev\LogViewer\Contracts\LogViewer
     */
    public $logViewer;

    /**
     * @var Arr
     */
    protected $arr;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * LogViewerSystem constructor.
     * @param Arr $arr
     */
    public function __construct(Arr $arr)
    {
        $this->logViewer = app('arcanedev.log-viewer');
        $this->arr = $arr;
    }

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $stats     = $this->logViewer->statsTable();
        $chartData = $this->prepareChartData($stats);
        $percents  = $this->calcPercentages($stats->footer(), $stats->header());

        return compact('chartData', 'percents', 'stats');
    }

    /**
     * List all logs.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\View\View
     */
    public function showLogs(Request $request)
    {
        $stats   = $this->logViewer->statsTable();
        $headers = $stats->header();
        $rows    = $this->paginate($stats->rows(), $request);

        return compact('headers', 'rows', 'footer', 'stats');
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
        $stats   = $this->logViewer->statsTable();
        $log     = $this->getLogOrFail($date);
        $levels  = $this->logViewer->levelsNames();
        $entries = $log->entries()->paginate($this->perPage);
        return compact('log', 'levels', 'entries', 'stats');
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
        $stats   = $this->logViewer->statsTable();

        $log = $this->getLogOrFail($date);

        $levels  = $this->logViewer->levelsNames();
        $entries = $this->logViewer
            ->entries($date, $level)
            ->paginate($this->perPage);

        return compact('log', 'levels', 'entries', 'stats');
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
        return $this->logViewer->download($date);
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
        $date = $request->get('date');
        $deleted = $this->logViewer->delete($date);
        return $deleted;
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Paginate logs.
     *
     * @param  array                     $data
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    protected function paginate(array $data, Request $request)
    {
        $page   = $request->get('page', 1);
        $offset = ($page * $this->perPage) - $this->perPage;
        $items  = array_slice($data, $offset, $this->perPage, true);
        $rows   = new LengthAwarePaginator($items, count($data), $this->perPage, $page);

        $rows->setPath($request->url());

        return $rows;
    }

    /**
     * Get a log or fail
     *
     * @param  string  $date
     *
     * @return \Arcanedev\LogViewer\Entities\Log|null
     */
    protected function getLogOrFail($date)
    {
        $log = null;

        try {
            $log = $this->logViewer->get($date);
        }
        catch (LogNotFoundException $e) {
            abort(404, $e->getMessage());
        }

        return $log;
    }

    /**
     * Prepare chart data.
     *
     * @param  \Arcanedev\LogViewer\Tables\StatsTable  $stats
     *
     * @return string
     */
    protected function prepareChartData(StatsTable $stats)
    {
        $totals = $stats->totals()->all();

        return json_encode([
            'labels'   => $this->arr->pluck($totals, 'label'),
            'datasets' => [
                [
                    'data'                 => $this->arr->pluck($totals, 'value'),
                    'backgroundColor'      => $this->arr->pluck($totals, 'color'),
                    'hoverBackgroundColor' => $this->arr->pluck($totals, 'highlight'),
                ],
            ],
        ]);
    }

    /**
     * Calculate the percentage.
     *
     * @param  array  $total
     * @param  array  $names
     *
     * @return array
     */
    protected function calcPercentages(array $total, array $names)
    {
        $percents = [];
        $all      = $this->arr->get($total, 'all');

        foreach ($total as $level => $count) {
            $percents[$level] = [
                'name'    => $names[$level],
                'count'   => $count,
                'percent' => $all ? round(($count / $all) * 100, 2) : 0,
            ];
        }

        return $percents;
    }
}