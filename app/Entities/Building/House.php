<?php

namespace App\Entities\Building;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class House.
 *
 * @package namespace App\Entities\Building;
 */
class House extends Model implements Transformable
{
    use TransformableTrait;

    const AREA = 1;
    const GONGWEI = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id',
        'floor_id',
        'name',
        'business_status',
        'lease_status',

        'space_count',
        'decoration',
        'decoration_id',
        'fee',
        'price_unit',

        'has_lease_count',
        'contract_all',
        'contract_past',
        'contract_now',

        'house_label',
    ];

    public function contract()
    {
        return $this->belongsToMany(\App\Entities\Contract\Contract::class,'contract_house','house_id','contract_id')->withPivot('space');
    }
}
