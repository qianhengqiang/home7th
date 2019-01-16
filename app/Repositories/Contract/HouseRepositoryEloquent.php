<?php

namespace App\Repositories\Contract;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contract\HouseRepository;
use App\Entities\Contract\House;
use App\Validators\Contract\HouseValidator;

/**
 * Class HouseRepositoryEloquent.
 *
 * @package namespace App\Repositories\Contract;
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
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
