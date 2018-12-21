<?php

namespace App\Transformers\Building;

use League\Fractal\TransformerAbstract;
use App\Entities\Building\Property;

/**
 * Class PropertyTransformer.
 *
 * @package namespace App\Transformers\Building;
 */
class PropertyTransformer extends TransformerAbstract
{
    /**
     * Transform the Property entity.
     *
     * @param \App\Entities\Building\Property $model
     *
     * @return array
     */
    public function transform(Property $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
