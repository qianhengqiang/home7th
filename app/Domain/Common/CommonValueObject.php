<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/17
 * Time: 2:10 PM
 */

namespace App\Domain\Common;
abstract class ValueObject
{

//    public function __set($name, $value)
//    {
//        // TODO: Implement __set() method.
//
//        return $this->$name = $value;
//    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

}
