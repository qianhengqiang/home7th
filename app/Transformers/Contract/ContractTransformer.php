<?php

namespace App\Transformers\Contract;

use League\Fractal\TransformerAbstract;
use App\Entities\Contract\Contract;

/**
 * Class ContractTransformer.
 *
 * @package namespace App\Transformers\Contract;
 */
class ContractTransformer extends TransformerAbstract
{
    /**
     * Transform the Contract entity.
     *
     * @param \App\Entities\Contract\Contract $model
     *
     * @return array
     */
    public function transform(Contract $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
