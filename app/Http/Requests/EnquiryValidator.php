<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryValidator extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'middle_name'=>'',
            'email'=>'required|email',
            'phone'=>'required|integer',
            'address'=>'required|string',
            'subject'=>'required|string',
            'qualification_level'=>'required|string',
            'experience'=>'required|string',
            'country_interested'=>'required|string',
            'service_interested'=>'required|string',
            'enquiry_from'=>'',
            'source'=>'',
            'remarks'=>'',
            'responded_through'=>'',
            'eligibility'=>'required|string',
            'Category_id'=>'required|string'
        ];
    }
}
