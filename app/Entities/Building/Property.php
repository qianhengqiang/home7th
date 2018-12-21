<?php

namespace App\Entities\Building;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Property.
 *
 * @package namespace App\Entities\Building;
 */
class Property extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'building_id',
        'property_type',
        'interval_month',
        'fee',
        'price_unit',

        'pay_in_advance_day',
        'pay_in_advance_type',
        'deposit_unit',
        'calculate_precision',
        'calculate_type',

        'day_number_per_year',
        'lease_divide_type',
        'month_price_convert_type',
    ];

    protected $table = 'building_property_setting';

    public $timestamps = false;
}
