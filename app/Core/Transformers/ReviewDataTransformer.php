<?php

namespace App\Core\Transformers;

use App\Core\Models\ProductReview;
use League\Fractal\TransformerAbstract;

class ReviewDataTransformer extends TransformerAbstract
{
    public function transform(ProductReview $review)
    {
        return [
            'id' => $review->id,
            'product' => $review->product->title,
            'rating' => $this->getReviewRating($review),
            'hidden' => $this->getReviewHidden($review),
            'isViewed' => $this->getIsViewed($review),
            'author' => $review->user->name,
            'created_at' => $review->created_at,
            'updated_at' => $review->updated_at,
            'action' => $this->getActions($review),
        ];
    }
    private function getIsViewed(ProductReview $review)
    {
        if($review->comments->first()->isUnread(\Auth::user()->id)){
            return "<span class=\"review-item-status label label-warning\" > not read</span>";
        } else {
            return "<span class=\"review-item-status label label-info\" > already read</span>";
        };
    }
    private function getReviewRating(ProductReview $review)
    {
        return '<span class="review-item-status label label-default">'.$review->rating.'</span>';
    }

    private function getReviewHidden(ProductReview $review)
    {
        if ($review->hidden === 1) {
            return '<span class="review-item-status label label-warning"> hidden </span>';
        } else {
            return '<span class="review-item-status label label-info" > visible</span>';
        }
    }

    private function getActions(ProductReview $review)
    {
        return '<td align="center">
                <a class="btn btn-default" href="'.route('admin::reviews::show', $review->id).'" title="Show and Reply">
                <em class="fa fa-eye"></em>
                </a>
                <a class="btn btn-default edit" href="'.route('admin::reviews::edit', $review->id).'" title="Edit">
                    <em class="fa fa-pencil"></em>
                </a>
                <a class="btn btn-danger delete text-warning" href="'.route('admin::reviews::get.delete', $review->id).'"
                   title="Are you sure you want to delete?"><em class="fa fa-trash"></em>
                </a>
                </td>';
    }
}
