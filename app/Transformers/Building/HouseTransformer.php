<?php

namespace App\Transformers\Building;

use League\Fractal\TransformerAbstract;
use App\Entities\Building\House;

/**
 * Class HouseTransformer.
 *
 * @package namespace App\Transformers\Building;
 */
class HouseTransformer extends TransformerAbstract
{
    /**
     * Transform the House entity.
     *
     * @param \App\Entities\Building\House $model
     *
     * @return array
     */
    public function transform(House $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
