<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/12
 * Time: 3:37 PM
 */

namespace App\Repositories;

use App\Models\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerRepository
{

    private $manager;

    public function __construct(Auth $manager)
    {

        $this->manager = $manager;

    }


    public function changePassword($password)
    {
        $this->manager->password = Hash::make($password);

        $this->manager->save();
    }

    public function updateRolesToManager($roles)
    {
        $this->manager->syncRoles($roles);
    }


}
