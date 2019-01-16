<?php

namespace App\Transformers\Renter;

use League\Fractal\TransformerAbstract;
use App\Entities\Renter\Renter;

/**
 * Class RenterTransformer.
 *
 * @package namespace App\Transformers\Renter;
 */
class RenterTransformer extends TransformerAbstract
{
    /**
     * Transform the Renter entity.
     *
     * @param \App\Entities\Renter\Renter $model
     *
     * @return array
     */
    public function transform(Renter $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
