<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/18
 * Time: 10:13 AM
 */

namespace App\Domain\Common;


use App\Domain\BuildingDomain\AddressValueObject;
use App\Domain\BuildingDomain\BuildingAggregate;
use App\Domain\BuildingDomain\BuildingEntity;

class Factory
{
    public static function createBuildingAggregate($data):BuildingAggregate
    {

        $buildingEntity = new BuildingEntity();
        $address = new AddressValueObject(
            $data['province'],
            $data['city'],
            $data['area'],
            $data['location']
        );

        return new BuildingAggregate($buildingEntity,$address);

    }
}
