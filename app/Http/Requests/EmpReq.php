<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return[
            'emp_rfid'=> 'sometimes|required|unique:employees,id,'.$this->id,
            'emp_fn'=> 'required|string|min:2|max:255',
            'emp_ln'=> 'required|string|min:2|max:255',
            'emp_pos_id'=> 'required',
            'emp_date_hired'=> 'required',
            'emp_addr'=> 'required|string|min:2|max:255',
            'emp_cn'=> 'required|phone:PH',
            'emp_gender'=> 'required',
            'status'=> 'required',
        ];
    }

    public function messages(): array
    {
        return[
            'emp_rfid.required' => 'RFID is required.',
            'emp_fn.required' => 'First Name is required.',
            'emp_fn.min' => 'First Name must be at least 2 characters.',
            'emp_ln.required' => 'Last Name is required.',
            'emp_pos_id.required' => 'Position is required.',
            'emp_date_hired.required' => 'Date of Hired is required.',
            'emp_addr.required' => 'Address is required.',
            'emp_cn.required' => 'Mobile Number is required.',
            'emp_gender.required' => 'Gender is required.',
            'status.required' => 'Status is required.',

        ];
    }
}
