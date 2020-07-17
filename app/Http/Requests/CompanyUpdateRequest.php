<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
        $id = $this->route()->parameter('company')->id;

        /**
         * Usage of id
         * 'username' => 'required|unique:users,username,' . $id,
         */

        return [
            'id' => 'required|unique:companies,id,' . $id,
            'company_name' => 'required',
            'company_website' => 'nullable|url',
            'company_email' => 'nullable|email',
            'company_logo' => 'nullable|dimensions:min_width=100,min_height=100',
        ];
    }
}
