<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingPropertySetting extends Model
{
    //
    protected $table = 'building_property_setting';

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

    public $timestamps = false;
}
