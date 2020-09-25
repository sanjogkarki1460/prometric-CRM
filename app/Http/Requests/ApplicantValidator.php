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
            'last_name'=>'required',
            'middle_name'=>'',
            'email'=>'',
            'phone'=>'required',
            'maiden_name'=>'',
            'gender'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'subject'=>'',
            'Category_id'=>'required',
            'qualification_level'=>'',
            'experience'=>'required',
            'country_interested'=>'',
            'service_interested'=>'',
            'identity_type'=>'required',
            'identity_card_no'=>'',
            'passport_no'=>'',
            'citizen_no'=>'',
            'current_country'=>'',
            'nationality'=>'',
            'passport_docs'=>'',
            'progress_sts'=>'',
            'status'=>'required',
            'remarks'=>'',
            'color_code'=>'',
        ];
    }
}
