<?php

namespace App\Validators\Building;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PropertyValidator.
 *
 * @package namespace App\Validators\Building;
 */
class PropertyValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'property_type' => 'required',
            'interval_month' => 'required',
            'fee' => 'required',

            'price_unit' => 'required',
            'pay_in_advance_day' => 'required',
            'pay_in_advance_type' => 'required',
            'deposit_unit' => 'required',

            'calculate_precision' => 'required',
            'calculate_type' => 'required',
            'day_number_per_year' => 'required',
            'lease_divide_type' => 'required',
            'month_price_convert_type' => 'required',
            'building_id' => 'nullable',

        ],
        ValidatorInterface::RULE_UPDATE => [
//            'property_type' => 'required',
            'interval_month' => 'required',
//            'fee' => 'required',

            'price_unit' => 'required',
            'pay_in_advance_day' => 'required',
            'pay_in_advance_type' => 'required',
            'deposit_unit' => 'required',

            'calculate_precision' => 'required',
            'calculate_type' => 'required',
            'day_number_per_year' => 'required',
            'lease_divide_type' => 'required',
            'month_price_convert_type' => 'required',
            'building_id' => 'nullable',

        ],
    ];
}
