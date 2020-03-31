<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'service_name'=>"required",
            'service_number' => "required",
            'service_type'=>"required",
            'service_cost'=>"required",
            'service_client_cost'=>"required",
            'service_working_hours'=>"required",

        ];
    }

    public function messages()
    {
        return [
            'service_name.required' => 'This field is required',
            'service_number.required'  => 'This field is required',
            'service_type.required'  => 'This field is required',
            'service_cost.required' => 'This field is required',

            'service_client_cost.required' => 'This field is required',
            'service_working_hours.required' => 'This field is required',

        ];
    }
}


