<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 9:05 PM
 */

namespace App\Domain\BuildingDomain;


use App\Domain\Common\ValueObject;

class FloorValueObject extends ValueObject
{
    public $buildingId;
    public $name;
    public $area;
    public $hourseNum;
    public $sort;

    public function __construct($buildingId,$name,$area,$hourseNum,$sort = null)
    {
        $this->buildingId = $buildingId;
        $this->name = $name;
        $this->area = $area;
        $this->hourseNum = $hourseNum;
        $this->sort = $sort;
    }
}
