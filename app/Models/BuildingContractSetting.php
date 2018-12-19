<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingContractSetting extends Model
{
    //
    protected $table = 'building_contract_setting';

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

    public $timestamps = false;
}
