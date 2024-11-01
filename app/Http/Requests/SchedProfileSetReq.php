<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedProfileSetReq extends FormRequest
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
        return [
            'sp_emp_id'=> 'sometimes|required|unique:schedule_profile,sp_emp_id,'.$this->id,
        ];
    }
}
