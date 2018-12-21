<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Common\Factory;
use App\Http\Requests\BuildingRequest;
use App\Models\Building;
use App\Models\BuildingFloor;
use App\Repository\Building\BuildingRepository;
use App\Repository\Building\Service;
use App\Repository\BuildingBeforeRepository;
use App\Services\BuildingService;
use Illuminate\Http\Request;

class BuildingController2 extends Controller
{
    //

    public $building;
    public $buildingService;

    public function __construct()
    {
        parent::__construct();

        $this->buildingService = new Service();
//        $this->building = new ;
    }

    public function create(BuildingRequest $request)
    {
        $result = $this->buildingService->createBuilding($request->all());

        return return_json($result);
    }

    public function index(Request $request)
    {

        $buildingList = $this->buildingService->getAllBuilding();

        return return_json($buildingList);
    }

    public function show(Request $request)
    {
        return return_json($this->buildingService->getBuildingbyId($request->id));

//        $building = (new BuildingBeforeRepository())->getById($request->id);

//        return return_json($building);
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        return return_json($this->buildingService->deleteBuildingbyId($request->id));
    }

}
