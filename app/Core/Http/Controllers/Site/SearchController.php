<?php

namespace App\Core\Http\Controllers\Site;

use App\Core\Models\Category;
use App\Core\Models\Product;
use Illuminate\Http\Request;

class SearchController extends BaseController
{
    public $viewPathBase = 'site.partials.search.';

    public function search(Request $request)
    {
        $data = null;
        if ($request->has('search')) {
            $searchBuilder = Product::search($request->input('search'));
            $data['products'] = $searchBuilder->take(5)->get();

            $searchCatBuilder = Category::search($request->input('search'));
            $data['categories'] = $searchCatBuilder->take(5)->get();
        }
        $data['products']->map(function ($item) {
            $item['url'] = route('site::products::show', [$item->unique_id]);
            $item['name'] = $item->title;
            $item['description'] = $item->body;
            $item['searchType'] = 'product';
        });

        $data['categories']->map(function ($item) {
            $item['url'] = route('site::products::index', [$item->unique_id]);
            $item['searchType'] = 'category';
        });

        $newDataArr = array_merge_recursive($data['products']->toArray(), $data['categories']->toArray());

        return response()->json($newDataArr);
    }
}
