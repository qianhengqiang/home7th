<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/12
 * Time: 2:30 PM
 */
namespace App\Domain;
class AuthDomain
{

    private $user;
    public function __construct($guard = 'user')
    {
        $this->user = auth($guard)->user();
    }

    public function getUserInfo()
    {
        return $this->user;
    }

}
