<?php

namespace App\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Core\Models\Design;
use App\Core\Repositories\DesignRepository;
use App\Http\Controllers\Controller;

/**
 * Class DesignsController
 * @package App\Http\Controllers
 */
class DesignController extends BaseController
{

    public function index(Request $request)
    {
        return "This is design page to list all available DESIGN options";
    }
}
