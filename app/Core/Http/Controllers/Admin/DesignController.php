<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Design;
use Illuminate\Http\Request;

/**
 * Class DesignsController.
 */
class DesignController extends BaseController
{
    public function index(Request $request)
    {
        return 'This is design page to list all available DESIGN options';
    }
}
