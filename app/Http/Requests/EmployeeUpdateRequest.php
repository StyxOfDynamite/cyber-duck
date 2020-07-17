<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('employee')->id;

        /**
         * Usage of id
         * 'username' => 'required|unique:users,username,' . $id,
         */

        return [
            'id' => 'required|unique:employees,id,' . $id,
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required',
            'last_name' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
        ];
    }
}
