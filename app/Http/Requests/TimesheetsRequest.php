<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetsRequest extends FormRequest
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
                'staff_id' => 'required',
                'allowance' => 'required',
                'work_day' => 'required',
                'advance' => 'required',
                'month' => 'required',
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
            'staff_id.required' => 'Mã nhân viên là bắt buộc',
            'allowance.required' => 'Phụ cấp là bắt buộc',
            'work_day.required' => 'Số ngày làm việc là bắt buộc',
            'advance.required' => 'Tiền tạm ứng là bắt buộc',
            'month.required' => 'Tháng tính lương bắt buộc',
        ];
    }
}
