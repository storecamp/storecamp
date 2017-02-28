<?php

namespace App\Core\Transformers;

use App\Core\Models\Layout;
use League\Fractal\TransformerAbstract;

/**
 * Class LayoutTransformer.
 */
class LayoutTransformer extends TransformerAbstract
{
    /**
     * Transform the \Layout entity.
     * @param \Layout $model
     *
     * @return array
     */
    public function transform(Layout $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
