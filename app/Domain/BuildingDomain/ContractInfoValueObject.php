<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 11:44 PM
 */

namespace App\Domain\BuildingDomain;


use App\Domain\Common\ValueObject;

class ContractInfoValueObject extends ValueObject
{
    public $calculatePrecision;
    public $calculateType;
    public $contractNumberPrefix;
    //年天数
    public $dayNumberPerYear;
    //保证金单位
    public $depositUnit;
    public $intervalMonth;
    public $leaseDivideRoleType;
    public $monthPriceConvertRoleType;
    public $openApproval;
    public $payInAdvanceDay;
    public $payInAdvanceType;
    public $priceUnit;
    public $spaceUnit;
    public $unitPricePrecision;
//账单提前提醒天数
    public $orderWarnDays;
    public function __construct()
    {
    }
}
