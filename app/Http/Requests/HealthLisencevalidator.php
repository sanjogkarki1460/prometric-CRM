<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthLisencevalidator extends FormRequest
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
            'applicant_id' => 'required',
            'license_conferred_date'=>'',
            'license_expiry_date'=>'',
            'license_number'=>'integer',
        ];
    }
}
