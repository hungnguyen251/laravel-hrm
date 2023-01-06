<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            '*' => [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone' => 'required',
                'decentralization' => 'required',
                'staff_id' => 'required'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên là bắt buộc',
            'email.required' => 'Email là bắt buộc',
            'password.required' => 'Mật khẩu là bắt buộc',
            'phone.required' => 'Số điện thoại là bắt buộc',
            'decentralization.required' => 'Phân quyền là bắt buộc',
            'staff_id.required' => 'Mã nhân viên là bắt buộc'
        ];
    }
}
