<?php

namespace App\Core\Transformers;

use App\Core\Models\Cart;
use League\Fractal\TransformerAbstract;

/**
 * Class CartTransformer.
 */
class CartTransformer extends TransformerAbstract
{
    /**
     * Transform the \Cart entity.
     * @param \Cart $model
     *
     * @return array
     */
    public function transform(Cart $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
