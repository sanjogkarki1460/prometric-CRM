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
            'issuing_authority_name'=>'',
            'issuing_authority_address'=>'',
            'issuing_authority_country'=>'',
            'issuing_authority_state'=>'',
            'issuing_authority_city'=>'',
            'issuing_authority_country_code'=>'',
            'issuing_authority_phone'=>'',
            'reason_for_leaving'=>'',
            'issuing_authority_email'=>'|email',
            'issuing_authority_website'=>'',
            'nature_of_employment'=>'',
            'employment_from'=>'',
            'employment_to'=>'',
            'designation'=>'',
            'employee_code'=>'',
            'department'=>'',
            'experience_letter'=>'file',
        ];
    }
}
