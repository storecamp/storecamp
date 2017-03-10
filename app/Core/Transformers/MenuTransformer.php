<?php

namespace App\Core\Transformers;

use App\Core\Models\Menu;
use League\Fractal\TransformerAbstract;

/**
 * Class MenuTransformer.
 */
class MenuTransformer extends TransformerAbstract
{
    /**
     * Transform the \Menu entity.
     * @param \Menu $model
     *
     * @return array
     */
    public function transform(Menu $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
