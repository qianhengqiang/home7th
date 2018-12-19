<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BuildingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
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

            'floor' => 'required|array',

            'contract.deposit_unit' => 'required',
            'contract.space_unit' => 'required',

            'contract.price_unit' => 'required',
            'contract.calculate_precision' => 'required',
            'contract.interval_month' => 'required',
            'contract.calculate_type' => 'required',
            'contract.pay_in_advance_day' => 'required',

            'contract.pay_in_advance_type' => 'required',
            'contract.day_number_per_year' => 'required',
            'contract.unit_price_precision' => 'required',
            'contract.lease_divide_type' => 'required',
            'contract.month_price_convert_type' => 'required',

            'property.property_type' => 'required',
            'property.interval_month' => 'required',
            'property.fee' => 'required',

            'property.price_unit' => 'required',
            'property.pay_in_advance_day' => 'required',
            'property.pay_in_advance_type' => 'required',
            'property.deposit_unit' => 'required',

            'property.calculate_precision' => 'required',
            'property.calculate_type' => 'required',
            'property.day_number_per_year' => 'required',
            'property.lease_divide_type' => 'required',
            'property.month_price_convert_type' => 'required',


            '',
            '',
            '',
            '',

            '',
            '',
            '',
            '',
            '',

            '',
            '',
            '',


//            ''
        ];
    }

    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json($validator->errors(), 422));

    }
}
