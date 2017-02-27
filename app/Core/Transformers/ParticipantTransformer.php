<?php

namespace App\Core\Transformers;

use League\Fractal\TransformerAbstract;
use App\Core\Models\Participant;

/**
 * Class ParticipantTransformer
 * @package namespace App\Core\Transformers;
 */
class ParticipantTransformer extends TransformerAbstract
{

    /**
     * Transform the \Participant entity
     * @param \Participant $model
     *
     * @return array
     */
    public function transform(Participant $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
