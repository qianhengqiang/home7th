<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/18
 * Time: 10:46 AM
 */

namespace App\Services;


class BaseService
{
    protected $guard;

    protected $author;

    protected $permissions;

    public function __construct($guard)
    {
        $this->guard = $guard;
        $this->author = auth($guard)->user();
//        $this->permissions = $this->auth
    }
}
