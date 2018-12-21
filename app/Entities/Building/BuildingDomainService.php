<?php
/**
 * Created by PhpStorm.
 * User: qianhengqiang
 * Date: 2018/12/20
 * Time: 2:55 PM
 */

namespace App\Entities\Building;


use App\Repositories\Building\BuildingRepository;
use App\Repositories\Building\ContractRepository;
use App\Repositories\Building\FloorRepository;
use App\Repositories\Building\PropertyRepository;

class BuildingDomainService
{

    private $app;
    private $repository;
    private $contract;
    private $property;
    private $floor;

    public function __construct()
    {
        $this->app = app();
        $this->repository = $this->app->make(BuildingRepository::class);
        $this->contract = $this->app->make(ContractRepository::class);
        $this->property = $this->app->make(PropertyRepository::class);
        $this->floor = $this->app->make(FloorRepository::class);
    }

    public function createBuilding($data)
    {

        $floors = $data['floor'];

        unset($data['floor']);

        $contractData = $data['contract'];

        unset($data['contract']);

        $propertyData = $data['property'];

        unset($data['property']);

        $building = $this->repository->create($data);

        $contract = $this->contract->create($contractData);

        $property = $this->property->create($propertyData);
//
        $building->contractInfo()->save($contract);

        $building->propertyInfo()->save($property);

        $building->floors()->createMany($floors);

        return $this->repository->with(['floors','contractInfo','propertyInfo'])->find($building->id);
    }

    public function deleteBuildingById($id)
    {

        $building = $this->repository->find($id);

        $building->contractInfo()->delete();

        $building->propertyInfo()->delete();

        $building->floors()->delete();

        return $building->delete();
    }

    public function updateBuilding($data,$id)
    {
//        return $data;
        $floorsTmp = collect($data['floor']);

        unset($data['floor']);

        $contractData = $data['contract'];

        unset($data['contract']);

        $propertyData = $data['property'];

        unset($data['property']);

        $building = $this->repository->update($data,$id);

        $this->contract->update($contractData,$building->contractInfo->id);
        $this->property->update($propertyData,$building->propertyInfo->id);

        $floorsExist = $building->floors;

        $willDelIds = $floorsExist->willDeleteIds($floorsTmp);

        foreach ($willDelIds as $v){

            $this->floor->delete($v);

        }

        $floors = [];

        foreach ($floorsTmp as $floor){

            if(isset($floor['id']))

                $floors[] = $this->floor->update($floor,$floor['id']);

            else

                $floors[] = $this->floor->create($floor);

        }
        $building->floors()->saveMany($floors);

        return    $this->repository->with(['contractInfo','propertyInfo','floors'])->find($id);
    }
}
