<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/14
 * Time: 5:26 PM
 */

namespace App\Domain\BuildingDomain;

use Ramsey\Uuid\Uuid;

class BuildingEntity
{
    //写字楼
//    const OFFICE_BUILDING=1;
    //联合办公
//    const COOPERATION_BUILDING=2;

    public $buildingId;

//    private $type;
//
    public $address;

    //合同信息
    public $contract;

    //招商联系电话
    public $bussinessMobile;

    public $owner;

    public $name;

    public $useFor;


    public function __construct()
    {
        $this->nextIdentity();
    }

    public function nextIdentity()
    {
        return 'aaa';
//        $this->buildingId = Uuid::uuid1();
    }

}
