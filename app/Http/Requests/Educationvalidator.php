<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Educationvalidator extends FormRequest
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
            'applicant_id'=>'required',
            'authority_country_code'=>'',
            'authority_email'=>'',
            'study_from'=>'',
            'study_to'=>'',
            'conferred_date'=>'',
            'degree_issue_date'=>'',
            'expected_degree_issue_date'=>'',
        ];
    }
}
