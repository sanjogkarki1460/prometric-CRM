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
            'first_name'=>'required',
            'last_name'=>'required',
            'middle_name'=>'',
            'email'=>'required',
            'phone'=>'required|integer',
            'address'=>'',
            'subject'=>'',
            'qualification_level'=>'',
            'experience'=>'',
            'country_interested'=>'',
            'service_interested'=>'',
            'enquiry_from'=>'',
            'source'=>'',
            'remarks'=>'',
            'responded_through'=>'',
            'eligibility'=>'',
            'Category_id'=>'required',
            'Office_visited'=>'',
            'Visited_date'=>'',
        ];
    }
}
