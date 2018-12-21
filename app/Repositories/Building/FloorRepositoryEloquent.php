<?php

namespace App\Repositories\Building;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Building\FloorRepository;
use App\Entities\Building\Floor;
use App\Validators\Building\FloorValidator;

/**
 * Class FloorRepositoryEloquent.
 *
 * @package namespace App\Repositories\Building;
 */
class FloorRepositoryEloquent extends BaseRepository implements FloorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Floor::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return FloorValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
