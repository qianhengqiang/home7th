<?php

namespace App\Entities\Building;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contract.
 *
 * @package namespace App\Entities\Building;
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
        'building_id',
        'deposit_unit',
        'space_unit',

        'price_unit',
        'calculate_precision',
        'interval_month',
        'calculate_type',
        'pay_in_advance_day',

        'pay_in_advance_type',
        'day_number_per_year',
        'unit_price_precision',
        'lease_divide_type',
        'month_price_convert_type',
    ];

    protected $table = 'building_contract_setting';

    public $timestamps=false;

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

}
