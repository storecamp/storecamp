<?php
/**
 * Created by PhpStorm.
 * User: nilse
 * Date: 02.02.2017
 * Time: 13:05
 */

namespace App\Core\Contracts;

use \Illuminate\Http\Request;

/**
 * Interface LogViewerSystemContract
 * @package App\Core\Contracts
 */
interface LogViewerSystemContract
{
    /**
     * @return mixed
     */
    public function dashboard();

    /**
     * @param Request $request
     * @return mixed
     */
    public function showLogs(Request $request);

    /**
     * @param $date
     * @return mixed
     */
    public function show($date);

    /**
     * @param $date
     * @param $level
     * @return mixed
     */
    public function showByLevel($date, $level);

    /**
     * @param $date
     * @return mixed
     */
    public function download($date);

    /**
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request);

}