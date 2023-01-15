<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalaryRequest extends FormRequest
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
            'amount' => 'required',
            'insurance_amount' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => 'Tiền lương là bắt buộc',
            'insurance_amount.required' => 'Mức đóng bảo hiểm là bắt buộc'
        ];
    }
}
