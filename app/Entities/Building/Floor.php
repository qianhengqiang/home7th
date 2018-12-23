<?php

namespace App\Entities\Building;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Floor.
 *
 * @package namespace App\Entities\Building;
 */
class Floor extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id',
        'name',
        'space_count',
        'hourse_count',
    ];

    protected $table = 'building_floors';

    public $timestamps = false;

    public function addHouse(House $house)
    {
        $this->space_count += $house->space_count;
        $this->hourse_count ++ ;
        return $this;
    }

    public function deleteHouse(House $house)
    {
        $this->space_count -= $house->space_count;
        $this->hourse_count --;
        return $this;
    }

    public function updateHouse(House $house)
    {
        $this->space_count += ($house->space_count - $house->getOriginal('space_count'));
        return $this;
    }

}
