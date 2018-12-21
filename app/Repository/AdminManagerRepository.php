<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/13
 * Time: 1:51 AM
 */

namespace App\Repository;


use App\Models\Auth;

class AdminManagerRepository
{

    private  $manager;

    public function __construct(Auth $manager)
    {

        $this->manager = $manager;

    }

    public function addManager()
    {

    }

    public function assignRoleToUser($roles)
    {
        $this->manager->syncRoles($roles);
    }

}
