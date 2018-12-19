<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/19
 * Time: 7:29 PM
 */

namespace App\Repository\Building;


use App\Models\Building;
use App\Models\BuildingContractSetting;
use App\Models\BuildingFloor;
use App\Models\BuildingPropertySetting;
use Illuminate\Support\Facades\DB;

class Service
{
    public function createBuilding($data)
    {
        $user = auth(request('guard',config('system.default_guard')))->user();


        $data['user_id'] = $user->id;
        $floorTmp = $data['floor'];

        unset($data['floor']);

        $contractData = $data['contract'];

        unset($data['contract']);

        $propertyData = $data['property'];

        unset($data['property']);


        $building = BuildingRepository::create($data);


        $contractData['building_id'] = $propertyData['building_id'] = $building->id;

        $contract = BuildingContractSetting::create($contractData);

        $property = BuildingPropertySetting::create($propertyData);

        $floor = array_map(function($v)use($building){

            return ['building_id'=>$building->id,'name'=>$v['name']];

        },$floorTmp);

        DB::table('building_floors')->insert($floor);

        return compact('building','contract','property','floor');
    }

    public function getBuildingbyId($id)
    {

        return BuildingRepository::with(['contract','floor','property'])->find($id);

    }

    public function getAllBuilding()
    {
        return Building::all();
    }

    public function deleteBuildingbyId($id)
    {
        $building =  BuildingRepository::find($id);
        if(!$building)
            return true;
        $building->contract()->delete();
        $building->floor()->delete();
        $building->property()->delete();
        return $building->delete();
    }
}
