<?php

namespace App\Entities\Contract;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class House.
 *
 * @package namespace App\Entities\Contract;
 */
class House extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'house_id',
        'contract_id',
        'building_id',
        'space',
    ];

}
