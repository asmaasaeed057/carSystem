<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'fullName'=>"required",
            'phone' => "required",
            'address'=>"required",
            'email'=>"required",
            'client_type' => "required"

        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'This field is required',
            'phone.required'  => 'This field is required',
            'address.required'  => 'This field is required',
            'email.required' => 'This field is required',
            'client_type.required' => 'This field is required',

        ];
    }
}


