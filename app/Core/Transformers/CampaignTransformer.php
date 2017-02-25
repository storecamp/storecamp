<?php

namespace App\Core\Transformers;

use App\Core\Models\Campaign;
use League\Fractal\TransformerAbstract;

/**
 * Class CompaignTransformer
 * @package namespace App\Core\Transformers;
 */
class CampaignTransformer extends TransformerAbstract
{

    /**
     * @param Campaign $model
     * @return array
     */
    public function transform(Campaign $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
