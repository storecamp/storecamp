<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Banner;

/**
 * Class BannerTransformer
 * @package namespace App\Core\Transformers;
 */
class BannerTransformer extends TransformerAbstract
{

    /**
     * Transform the \Banner entity
     * @param \Banner $model
     *
     * @return array
     */
    public function transform(Banner $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
