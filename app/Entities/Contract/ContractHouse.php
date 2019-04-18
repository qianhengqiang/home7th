<?php

namespace App\Entities\Contract;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ContractHouse.
 *
 * @package namespace App\Entities\Contract;
 */
class ContractHouse extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $table = 'contract_house';

    public function houseByContractId($contractId)
    {
        return $this->where('contract_id','=',$contractId);
    }
}
