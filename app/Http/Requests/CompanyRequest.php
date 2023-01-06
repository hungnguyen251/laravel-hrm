<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required',
            'tax_code' => 'required',
            'founding_date' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên công ty là bắt buộc',
            'tax_code.required' => 'MST công ty là bắt buộc',
            'founding_date.required' => 'Ngày thành lập là bắt buộc',
            'email.required' => 'Email công ty là bắt buộc',
            'phone.required' => 'SĐT công ty là bắt buộc',
            'address.required' => 'Địa chỉ công ty là bắt buộc'
        ];
    }
}
