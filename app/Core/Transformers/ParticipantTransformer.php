<?php

namespace App\Core\Transformers;

use App\Core\Models\Participant;
use League\Fractal\TransformerAbstract;

/**
 * Class ParticipantTransformer.
 */
class ParticipantTransformer extends TransformerAbstract
{
    /**
     * Transform the \Participant entity.
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
            'updated_at' => $model->updated_at,
        ];
    }
}
