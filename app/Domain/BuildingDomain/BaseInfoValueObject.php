<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/18
 * Time: 3:15 PM
 */

namespace App\Domain\BuildingDomain;


use App\Domain\Common\ValueObject;

class BaseInfoValueObject extends ValueObject
{

    //建筑面积
    protected $structorArea;
    //占地面积
    protected $floorArea;
    //建成时间
    protected $buildTime;

}
