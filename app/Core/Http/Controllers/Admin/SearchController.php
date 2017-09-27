<?php

namespace App\Core\Http\Controllers\Admin;

use App\Core\Models\Category;
use App\Core\Models\Product;
use App\Core\Models\User;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public $viewPathBase = 'admin.partials.search.';

    public function searchUser(Request $request)
    {
        $data = null;

        if ($request->has('search')) {
            $searchBuilder = User::search($request->input('search'));
            $data = $searchBuilder->take(10)->get();
            $data->map(function ($item) {
               $item['text'] = $item['email'];
            });
        }

        return response()->json($data);
    }
}
