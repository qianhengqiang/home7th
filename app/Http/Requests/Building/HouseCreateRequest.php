<?php

namespace App\Http\Requests\Building;

use Illuminate\Foundation\Http\FormRequest;

class HouseCreateRequest extends FormRequest
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
            'building_id'=>'required|numeric',
            'floor_id'=>'required|numeric',
            'name'=>'required',
            'business_status'=>'required',
            'space_count'=>'required',
            'decoration'=>'required',
            'decoration_id'=>'required',
            'fee'=>'required',
            'price_unit'=>'required',

        ];
    }
}
