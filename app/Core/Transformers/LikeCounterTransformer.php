<?php

namespace App\Core\Transformers;

use App\Core\Models\LikeCounter;
use League\Fractal\TransformerAbstract;

/**
 * Class LikeCounterTransformer.
 */
class LikeCounterTransformer extends TransformerAbstract
{
    /**
     * Transform the \LikeCounter entity.
     * @param \LikeCounter $model
     *
     * @return array
     */
    public function transform(LikeCounter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
