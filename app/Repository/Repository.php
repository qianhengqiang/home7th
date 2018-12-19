<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/16
 * Time: 10:52 PM
 */

namespace App\Repository;


abstract class Repository
{
    public abstract function add();
    public abstract function save();
    public abstract function saveAll();
    public abstract function remove();
    public abstract function removeAll();
    public abstract function getById();
}
