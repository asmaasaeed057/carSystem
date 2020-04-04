<?php

namespace App\Http\Requests\CarBrand;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarBrandRequest extends FormRequest
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
            'name_en'=>"required",
            'name_ar' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => 'This field is required',
            'name_ar.required'  => 'This field is required',
        ];
    }
}


