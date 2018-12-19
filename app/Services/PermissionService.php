<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/12
 * Time: 3:39 PM
 */

namespace App\Services;

use App\Models\Auth;
use App\Models\User;
use App\Repository\ErrorCodeRepository;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionService extends BaseService
{

    private $auth;

    private $role;

    private $permission;

    private $permissions;

    public function __construct($guard)
    {
        parent::__construct($guard);
//        $this->guard = $guard;

    }

    public function getRoleFetch()
    {
        return Role::where('guard_name',$this->guard)->get();
    }

    public function addRole($role)
    {
        $this->role = Role::findOrcreate($role);
    }

    public function addRoleWithPermissions($role,$permissions)
    {
        $this->addRole($role);

        $this->assignPermisionsToRole($role,$permissions);

        return success_code();
    }

//    protected function isRoleExist($name)
//    {
//
//        if(Role::where('guard_name','=',$this->guard)->where('name','=',$name)->first())
//
//            return true;
//
//        else
//
//            return false;
//
//    }

    public function deleteRole($role)
    {
        try{

            $this->setRole($role);

            $this->role->delete();

            return success_code();

        }catch (RoleDoesNotExist $e){

            return error_exception($e);

        }

    }

    protected function setRole($role){

        if (is_numeric($role)) {

            if(is_null($this->role)||$this->role->id != $role)

                $this->role = Role::findById($role);

        } else {

            if(is_null($this->role)||$this->role->name != $role)

                $this->role = Role::findByName($role);

        }

    }

    public function addPermission($permission)
    {

        try{

            Permission::create(['name'=>$permission]);

            return success_code();

        }catch (PermissionAlreadyExists $e){

            return error_exception($e);

        }

    }

    public function deletePermission($permission)
    {

        try {

            $this->setPermission($permission);

            $this->permission->delete();

            return success_code();

        }catch (PermissionDoesNotExist $e){

            return error_exception($e);

        }

    }

//    protected function isPermissionExist($name)
//    {
//
//        if(Permission::where('guard_name','=',$this->guard)->where('name','=',$name)->first())
//
//            return true;
//
//        else
//
//            return false;
//
//    }

    protected function setPermission($permission){

        if(is_string($permission)){

            $this->permission = Permission::findByName($permission);

        }else{

            $this->permission = Permission::findById($permission);

        }

    }

    public function assignPermisionsToRole($role,$permissions)
    {

        $this->setRole($role);

        if(is_array($permissions)){

            $this->permissions = $permissions;

        }

        if(is_string($permissions)){

            $this->permissions = explode(',',$permissions);

        }

        $this->role->syncPermissions($this->permissions);

        return success_code();

    }

    public function getPermissionsByRole($role)
    {

        $this->setRole($role);

        return $this->role->getAllPermissions();

    }

    public function getAllPermissions()
    {
        return Permission::where('guard_name',$this->guard)->get();

    }

}
