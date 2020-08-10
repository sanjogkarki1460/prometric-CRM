<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantValidator extends FormRequest
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
            'first_name'=>'required',
            'middel_name'=>'',
            'surname' =>'required',
            'maiden_name'=>'',
            'gender'=>'required',
            'dob'=>'required',
            'identity_type'=>'required',
            'identity_card_no'=>'',
            'passport_no'=>'',
            'birth_country'=>'',
            'country_code'=>'',
            'mobile_no' =>'integer',
            'current_country'=>'',
            'nationality' =>'required',
            'email' =>'required',
            'passport_docs' =>'file',
            'applicant_category' =>'required',
            'services_id' =>'integer',
            'enquired'=>'required',
            'enquired_id'=>'integer',
            'progress_sts'=>'',
        ];
    }
}
