<?php

namespace App\Entities\Contract;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contract.
 *
 * @package namespace App\Entities\Contract;
 */
class Contract extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contract_number','status','start_time','end_time','sign_time',
        'calculate_precision','unit_price_precision',
        'renter_id','renter_name','industry_category',
        'proxyer','sign_people', 'contact_people','other_info', 'gongwei',
        'area','contract_price','price_unit','deposit_unit','interval_month',
        'calculate_type','day_number_per_year',
        'month_price_convert_type','lease_divide_type','pay_in_advance_type','pay_in_advance_day'
    ];


    public function house()
    {
        return $this->hasManyThrough(\App\Entities\Building\House::class,House::class);
    }

}
