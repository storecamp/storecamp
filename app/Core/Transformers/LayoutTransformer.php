<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Layout;

/**
 * Class LayoutTransformer
 * @package namespace App\Core\Transformers;
 */
class LayoutTransformer extends TransformerAbstract
{

    /**
     * Transform the \Layout entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
