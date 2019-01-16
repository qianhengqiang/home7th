<?php

namespace App\Repositories\Renter;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Renter\RenterRepository;
use App\Entities\Renter\Renter;
use App\Validators\Renter\RenterValidator;

/**
 * Class RenterRepositoryEloquent.
 *
 * @package namespace App\Repositories\Renter;
 */
class RenterRepositoryEloquent extends BaseRepository implements RenterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Renter::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RenterValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
