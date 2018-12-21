<?php

namespace App\Repositories\Building;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Building\PropertyRepository;
use App\Entities\Building\Property;
use App\Validators\Building\PropertyValidator;

/**
 * Class PropertyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Building;
 */
class PropertyRepositoryEloquent extends BaseRepository implements PropertyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Property::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PropertyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
