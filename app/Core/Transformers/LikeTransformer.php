<?php

namespace App\Core\Transformers;

use App\Core\Models\Like;
use League\Fractal\TransformerAbstract;

/**
 * Class LikeTransformer.
 */
class LikeTransformer extends TransformerAbstract
{
    /**
     * Transform the \Like entity.
     *
     * @param Like $model
     *
     * @return array
     */
    public function transform(Like $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
