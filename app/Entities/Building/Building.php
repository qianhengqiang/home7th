<?php

namespace App\Entities\Building;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\PresentableTrait;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Building.
 *
 * @package namespace App\Entities\Building;
 */
class Building extends Model implements Transformable,Presentable
{
    use TransformableTrait,PresentableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'province',
        'city',
        'name',
        'area',

        'location',
        'bussiness_mobile',
        'use_for',
        'jianzhu_area',
        'zhandi_area',

        'manager_area',
        'build_time',
        'order_in_advance_day',
        'image',
        'pre_contract_num',

        'contract_midlle_type',
        'user_id',
    ];

    public function contractInfo()
    {
        return $this->hasOne(Contract::class);
    }

    public function floors()
    {
        return $this->hasMany(Floor::class);
    }

    public function propertyInfo()
    {
        return $this->hasOne(Property::class);
    }

    public function addHouse(House $house)
    {
        if($house->space_type == House::AREA) {
            $this->manager_area += $house->space_count;
        }else{
            $this->manager_gongwei += $house->space_count;
        }
        return $this;
    }

    public function deleteHouse(House $house)
    {
        if($house->space_type == House::AREA) {
            $this->manager_area -= $house->space_count;
        }else{
            $this->manager_gongwei -= $house->space_count;
        }
        return $this;
    }

    public function updateHouse(House $house)
    {
        if($house->space_type == House::AREA) {
            $this->manager_area += ($house->space_count - $house->getOriginal('space_count'));
        }else{
            $this->manager_gongwei += ($house->space_count - $house->getOriginal('space_count'));
        }
        return $this;
    }

    public function setUser($user)
    {

        $this->user_id = $user->id;

        return $this;
    }


}
