<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentValidator extends FormRequest
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
            'applicant_id'=>'Required|string',
            'issuing_authority_name'=>'string',
            'issuing_authority_address'=>'string',
            'issuing_authority_country'=>'string',
            'issuing_authority_state'=>'string',
            'issuing_authority_city'=>'string',
            'issuing_authority_country_code'=>'string',
            'issuing_authority_phone'=>'string',
            'reason_for_leaving'=>'string',
            'issuing_authority_email'=>'string|email',
            'issuing_authority_website'=>'string',
            'nature_of_employment'=>'string',
            'employment_from'=>'string|date',
            'employment_to'=>'string|date',
            'designation'=>'string',
            'employee_code'=>'string',
            'department'=>'string',
            'experience_letter'=>'file',
        ];
    }
}
