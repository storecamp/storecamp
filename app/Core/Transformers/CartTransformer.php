<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Cart;

/**
 * Class CartTransformer
 * @package namespace App\Core\Transformers;
 */
class CartTransformer extends TransformerAbstract
{

    /**
     * Transform the \Cart entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
