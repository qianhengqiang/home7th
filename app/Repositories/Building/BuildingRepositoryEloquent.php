<?php

namespace App\Repositories\Building;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Building\BuildingRepository;
use App\Entities\Building\Building;
use App\Validators\Building\BuildingValidator;

/**
 * Class BuildingRepositoryEloquent.
 *
 * @package namespace App\Repositories\Building;
 */
class BuildingRepositoryEloquent extends BaseRepository implements BuildingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Building::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BuildingValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
