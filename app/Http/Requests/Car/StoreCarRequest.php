<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'model'=>"required",
            'platNo' => "required",
            'car_structure_number' => "required",
            'car_color' => "required",
            'client_id'=>  "required",
            'carType_id' =>  "required",
            'car_brand_category_id' => "required"
        ];
    }

    public function messages()
    {
        return [
            'model.required' => 'This field is required',
            'platNo.required'  => 'This field is required',
            'car_structure_number' => 'This field is required',
            'car_color' => 'This field is required',
            'client_id' => 'This field is required',
            'carType_id' => 'This field is required',
            'car_brand_category_id' => 'This field is required',
        ];
    }
}


