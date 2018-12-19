<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 2:18 PM
 */

namespace App\Domain\BuildingDomain;


class BuildingAggregate
{
    public $building;
    public $address;
    public $floor;
    public $contractInfo;
    public $propertySetting;

    public function __construct(
        BuildingEntity $buildingEntity,
        AddressValueObject $addressValueObject
//        FloorValueObject $buildingFloorValueObject,
//        ContractInfoValueObject $buildingContractInfoValueObject,
//        PropertySettingValueObject $buildingPropertySettingValueObject
                                )
    {
        $this->building = $buildingEntity;

        $this->address = $addressValueObject;

//        $this->floor = $buildingFloorValueObject;
//
//        $this->contractInfo = $buildingContractInfoValueObject;
//
//        $this->propertySetting = $buildingPropertySettingValueObject;

    }

    public function getId()
    {
        return $this->building->buildingId;
    }

    public function getAddress(){
        return $this->address->getAddress();
    }
}
