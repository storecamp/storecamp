<?php

namespace App\Core\Transformers;

use App\Core\Models\Settings;
use League\Fractal\TransformerAbstract;

/**
 * Class SettingsTransformer.
 */
class SettingsTransformer extends TransformerAbstract
{
    /**
     * Transform the \Settings entity.
     * @param \Settings $model
     *
     * @return array
     */
    public function transform(Settings $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
