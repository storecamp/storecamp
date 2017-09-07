<?php

namespace App\Core\Http\Controllers\Site;


use App\Core\Models\Product;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public $viewPathBase = "site.partials.search.";

    public function search(Request $request)
    {
        $data = null;
        $count = 0;
        if ($request->has('search')) {
            $searchBuilder = Product::search($request->input('search'));
            $count = count($searchBuilder);
            $data = $searchBuilder->get();
        }
        $data->map(function($item) {
            $item['search'] = '<a href="'.route('site::products::show', [$item->unique_id]).'">'.$item->title.'</a>';
        });

        return response()->json($data);
    }
}