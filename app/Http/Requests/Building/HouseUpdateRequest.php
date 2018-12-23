<?php

namespace App\Http\Requests\Building;

use Illuminate\Foundation\Http\FormRequest;

class HouseUpdateRequest extends FormRequest
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
