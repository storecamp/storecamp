<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\MenuItems;

/**
 * Class MenuItemsTransformer
 * @package namespace App\Core\Transformers;
 */
class MenuItemsTransformer extends TransformerAbstract
{

    /**
     * Transform the \MenuItems entity
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
            'updated_at' => $model->updated_at
        ];
    }
}
