<?php

namespace App\Validators\Building;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ContractValidator.
 *
 * @package namespace App\Validators\Building;
 */
class ContractValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'deposit_unit' => 'required',
            'space_unit' => 'required',

            'price_unit' => 'required',
            'calculate_precision' => 'required',
            'interval_month' => 'required',
            'calculate_type' => 'required',
            'pay_in_advance_day' => 'required',

            'pay_in_advance_type' => 'required',
            'day_number_per_year' => 'required',
            'unit_price_precision' => 'required',
            'lease_divide_type' => 'required',
            'month_price_convert_type' => 'required',
            'building_id' => 'nullable',

        ],
        ValidatorInterface::RULE_UPDATE => [
            'deposit_unit' => 'required',
            'space_unit' => 'required',

            'price_unit' => 'required',
            'calculate_precision' => 'required',
            'interval_month' => 'required',
            'calculate_type' => 'required',
            'pay_in_advance_day' => 'required',

            'pay_in_advance_type' => 'required',
            'day_number_per_year' => 'required',
            'unit_price_precision' => 'required',
            'lease_divide_type' => 'required',
            'month_price_convert_type' => 'required',
            'building_id' => 'nullable',

        ],
    ];
}
