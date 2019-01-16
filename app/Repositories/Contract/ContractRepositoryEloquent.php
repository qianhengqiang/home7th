<?php

namespace App\Repositories\Contract;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contract\ContractRepository;
use App\Entities\Contract\Contract;
use App\Validators\Contract\ContractValidator;

/**
 * Class ContractRepositoryEloquent.
 *
 * @package namespace App\Repositories\Contract;
 */
class ContractRepositoryEloquent extends BaseRepository implements ContractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contract::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ContractValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
