<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 1:49 PM
 */

namespace App\Domain\BuildingDomain;


use App\Domain\Common\ValueObject;

class AddressValueObject extends ValueObject
{
    public $province;

    public $city;

    public $area;

    public $location;

    public function __construct($province,$city,$area,$location=null)
    {
        $this->province = $province;

        $this->city = $city;

        $this->area = $area;

        $this->location = $location;
    }

    public function getAddress()
    {
        return $this->province.' '.$this->city.' '.$this->area.' '.$this->location;
    }

}
