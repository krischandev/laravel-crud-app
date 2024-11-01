<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosReq extends FormRequest
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
            'pos_acronym'=> 'sometimes|required|string|min:3|max:3|unique:employees_position,id,'.$this->id,
            'pos_title'=> 'required|string|min:2|max:255',
            'pos_dept_id'=> 'required',
        ];
    }
}
