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
            'authority_country_code'=>'string',
            'authority_email'=>'email',
            'study_from'=>'date',
            'study_to'=>'date',
            'conferred_date'=>'date',
            'degree_issue_date'=>'date',
            'expected_degree_issue_date'=>'date',
        ];
    }
}
