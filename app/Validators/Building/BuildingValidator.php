<?php

namespace App\Validators\Building;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class BuildingValidator.
 *
 * @package namespace App\Validators\Building;
 */
class BuildingValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'              => 'required',
            'type'              => 'required|in:1,2,3...',
            'province'          => 'required',
            'city'              => 'required',
            'area'              => 'required',

            'location'          => 'required',
            'bussiness_mobile'  =>
                ['required','regex:/^[1][3|4|5|6|7|8|9]\d{9}$/'],
            'use_for'           => 'required',
            'jianzhu_area'      => 'required|numeric',
            'zhandi_area'       => 'required|numeric',

//            'manager_area'      => 'required|numeric',
            'build_time'        => 'required|date',
            'order_in_advance_day'=>'required|numeric',
            'image'             => 'required|numeric',
            'pre_contract_num'  => 'required',

            'contract_midlle_type'=> 'required|in:1,2...',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'              => 'required',
            'type'              => 'required|in:1,2,3...',
            'province'          => 'required',
            'city'              => 'required',
            'area'              => 'required',

            'location'          => 'required',
            'bussiness_mobile'  =>
                ['required','regex:/^[1][3|4|5|6|7|8|9]\d{9}$/'],
            'use_for'           => 'required',
            'jianzhu_area'      => 'required|numeric',
            'zhandi_area'       => 'required|numeric',

//            'manager_area'      => 'required|numeric',
            'build_time'        => 'required|date',
            'order_in_advance_day'=>'required|numeric',
            'image'             => 'required|numeric',
            'pre_contract_num'  => 'required',

            'contract_midlle_type'=> 'required|in:1,2...',
        ],
    ];
}
