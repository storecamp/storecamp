<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Like;

/**
 * Class LikeTransformer
 * @package namespace App\Core\Transformers;
 */
class LikeTransformer extends TransformerAbstract
{

    /**
     * Transform the \Like entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
