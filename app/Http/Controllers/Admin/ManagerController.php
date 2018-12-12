<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ManagerRequest;
use App\Services\ManagerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Controller;

class ManagerController extends Controller
{
    //

    private $managerService;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $this->managerService = new ManagerService($this->guard);
    }

    public function managerList(Request $request)
    {
//        return response()->json(['a'=>'ddd']);
        $list = $this->managerService->getManagerListByCondition($request->all());
//
        return return_json($list);
    }


    public function addManager(ManagerRequest $request)
    {

        $result = $this->managerService->createManager($request->all());

        return return_json($result);

    }

    public function changePassword(Request $request)
    {
        $result = $this->managerService->changePassword($request->id,$request->password);

        return return_json($result);

    }

    public function assignRolesToManager(Request $request)
    {

        $result = $this->managerService->assignRolesToManager($request->id,$request->roles);

        return return_json($result);

    }

    public function deleteManager(Request $request)
    {
        $result = $this->managerService->deleteManagerById($request->id);

        return return_json($result);
    }

}
