<?php

namespace App\Transformers\Building;

use League\Fractal\TransformerAbstract;
use App\Entities\Building\Building;

/**
 * Class BuildingTransformer.
 *
 * @package namespace App\Transformers\Building;
 */
class BuildingTransformer extends TransformerAbstract
{
    /**
     * Transform the Building entity.
     *
     * @param \App\Entities\Building\Building $model
     *
     * @return array
     */
    public function transform(Building $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
