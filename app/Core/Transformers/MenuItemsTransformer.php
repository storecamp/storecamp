<?php

namespace App\Core\Transformers;

use App\Core\Models\MenuItems;
use League\Fractal\TransformerAbstract;

/**
 * Class MenuItemsTransformer.
 */
class MenuItemsTransformer extends TransformerAbstract
{
    /**
     * Transform the \MenuItems entity.
     *
     * @param \MenuItems $model
     *
     * @return array
     */
    public function transform(MenuItems $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
