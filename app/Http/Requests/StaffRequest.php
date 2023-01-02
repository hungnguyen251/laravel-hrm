<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'type' => 'required',
                'position_id' => 'required',
                'department_id' => 'required',
                'diploma_id' => 'required',
                'marriage_status' => 'required',
                'start_date' => 'required'
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
            'first_name.required' => 'Tên và tên đệm là bắt buộc',
            'last_name.required' => 'Họ là bắt buộc',
            'gender.required' => 'Giới tính là bắt buộc',
            'date_of_birth.required' => 'Ngày sinh là bắt buộc',
            'type.required' => 'Loại nhân viên là bắt buộc',
            'position_id.required' => 'Vị trí là bắt buộc',
            'department_id.required' => 'Phòng ban là bắt buộc',
            'diploma_id.required' => 'Bằng cấp là bắt buộc',
            'marriage_status.required' => 'Tình trạng hôn nhân là bắt buộc',
            'start_date.required' => 'Ngày bắt đầu là bắt buộc',
        ];
    }
}
