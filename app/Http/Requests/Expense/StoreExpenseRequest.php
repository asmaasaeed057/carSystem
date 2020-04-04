<?php

namespace App\Http\Requests\Expense;

use Illuminate\Foundation\Http\FormRequest;

class StoreExpenseRequest extends FormRequest
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
            'expense_name'=>"required",
            'expense_bill' => "required",
            'expense_tax'=>"required",
            'expense_price'=>"required",
            'expense_date' => "required",
            'expense_notes' => "required"

        ];
    }

    public function messages()
    {
        return [
            'expense_name.required' => 'This field is required',
            'expense_bill.required'  => 'This field is required',
            'expense_tax.required'  => 'This field is required',
            'expense_price.required' => 'This field is required',
            'expense_date.required' => 'This field is required',
            'expense_notes.required' => 'This field is required',

        ];
    }
}


