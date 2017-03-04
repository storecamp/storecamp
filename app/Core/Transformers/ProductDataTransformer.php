<?php

namespace App\Core\Transformers;


use App\Core\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductDataTransformer extends TransformerAbstract
{
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'model' => $product->model,
            'title' => $product->title,
            'category' => $product->categories ? $product->categories->first()->name : "no category  provided",
            'price' => $product->price,
            'quantity' => $product->quantity,
            'availability' => $product->getAvailability(),
            'stock_status' => $product->getStockStatus(),
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            'review' => $this->getReviewButton($product),
            'action' => $this->getActions($product),
        ];
    }

    private function getReviewButton(Product $product)
    {
        return '<td>
                     <a class="edit" href="'.route('admin::reviews::create', $product->unique_id).'"
                        title="Make Review">
                       <i class="fa fa-eye"></i> Make review</a>
                </td>';
    }

    private function getActions(Product $product) {
        return '<a class="btn btn-default edit" href="'.route('admin::products::edit', $product->unique_id).'"
                title="Edit">
                <em class="fa fa-pencil"></em></a>
                <a class="btn btn-danger delete text-warning"
                href="'.route('admin::products::get::delete', $product->unique_id).'"
                title="Are you sure you want to delete?"><em class="fa fa-trash"></em></a>';
    }
}