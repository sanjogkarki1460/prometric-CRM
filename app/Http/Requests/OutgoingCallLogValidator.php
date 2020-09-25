<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutgoingCallLogValidator extends FormRequest
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
            'applicant_id'=>'',
            'enquiry_id'=>'',
            'call_by'=>'required',
            'phone'=>'required',
            'date'=>'required',
            'time'=>'required',
            'length'=>'',
            'porpose'=>'',
            'remarks'=>'',
        ];
    }
}
