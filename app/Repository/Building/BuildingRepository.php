<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/19
 * Time: 12:45 PM
 */

namespace App\Repository\Building;


use App\Models\Building;
use App\Models\BuildingContractSetting;
use App\Models\BuildingFloor;
use App\Models\BuildingPropertySetting;

class BuildingRepository extends Building
{
    private $foreign_key = 'building_id';

    public function contract()
    {
        return $this->hasOne(BuildingContractSetting::class,$this->foreign_key);
    }

    public function floor()
    {
        return $this->hasMany(BuildingFloor::class,$this->foreign_key);
    }

    public function property()
    {
        return $this->hasMany(BuildingPropertySetting::class,$this->foreign_key);
    }
}
