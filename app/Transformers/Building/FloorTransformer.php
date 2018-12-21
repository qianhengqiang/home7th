<?php

namespace App\Transformers\Building;

use League\Fractal\TransformerAbstract;
use App\Entities\Building\Floor;

/**
 * Class FloorTransformer.
 *
 * @package namespace App\Transformers\Building;
 */
class FloorTransformer extends TransformerAbstract
{
    /**
     * Transform the Floor entity.
     *
     * @param \App\Entities\Building\Floor $model
     *
     * @return array
     */
    public function transform(Floor $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
