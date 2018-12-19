<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 11:55 PM
 */

namespace App\Domain\BuildingDomain;


use App\Domain\Common\ValueObject;

class PropertySettingValueObject extends ValueObject
{

    public $calculatePrecision;
    public $dayNumberPerYear;
    public $depositUnit;
    public $leaseDivideRoleType;
    public $monthPriceConvertRoleType;
    public $payInAdvanceType;
    public $propertyCalculateType;
    public $propertyType;
    public $propertyUnit;
    public $unitPricePrecision;

    public function __construct(
        $calculatePrecision,
        $dayNumberPerYear,
        $depositUnit,
        $leaseDivideRoleType,
        $monthPriceConvertRoleType,
        $payInAdvanceType,
        $propertyCalculateType,
        $propertyType,
        $propertyUnit,
        $unitPricePrecision
    )
    {
    }
}
