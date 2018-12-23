<?php

namespace App\Repositories\Building;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Building\HouseRepository;
use App\Entities\Building\House;
use App\Validators\Building\HouseValidator;

/**
 * Class HouseRepositoryEloquent.
 *
 * @package namespace App\Repositories\Building;
 */
class HouseRepositoryEloquent extends BaseRepository implements HouseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return House::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return HouseValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
