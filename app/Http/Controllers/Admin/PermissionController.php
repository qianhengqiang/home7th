<?php

namespace App\Http\Controllers\Admin;

use App\Models\Auth;
use App\Services\PermissionService;
use App\User;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    //

    private $permissionService;

    public function __construct()
    {
        parent::__construct();

        $this->permissionService = new PermissionService($this->guard);
    }

    public function getAllRoles()
    {
        return $this->permissionService->getRoleFetch();
    }

    public function addRoleWithPermissions(Request $request)
    {
//        $result = $this->permissionService->addRole($request->input('name',null));
        $result = $this->permissionService->addRoleWithPermissions($request->name,$request->permissions);

        return return_json($result);

    }

    public function deleteRole(Request $request)
    {

        $result = $this->permissionService->deleteRole($request->input('name', null));

        return return_json($result);

    }

    public function assignPermisionsToRole(Request $request)
    {

        $result = $this->permissionService->assignPermisionsToRole($request->role,$request->permissions);

        return return_json($result);
    }

    public function getPermissionsByRole(Request $request)
    {
        return $this->permissionService->getPermissionsByRole($request->role);
    }

    public function getAllPermissions()
    {
        return $this->permissionService->getAllPermissions();
    }

    public function addPermission(Request $request)
    {

        $result = $this->permissionService->addPermission($request->input('name',null));

        return return_json($result);

    }

    public function deletePermission(Request $request)
    {

        $result = $this->permissionService->deletePermission($request->input('name',null));

        return return_json($result);

    }



    public function assignPermissionToRole()
    {

    }

    public function assignPermissionToUser()
    {

    }
}
