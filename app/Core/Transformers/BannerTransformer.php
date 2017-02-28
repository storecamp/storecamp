<?php

namespace App\Core\Transformers;

use App\Core\Models\Banner;
use League\Fractal\TransformerAbstract;

/**
 * Class BannerTransformer.
 */
class BannerTransformer extends TransformerAbstract
{
    /**
     * Transform the \Banner entity.
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
            'updated_at' => $model->updated_at,
        ];
    }
}
