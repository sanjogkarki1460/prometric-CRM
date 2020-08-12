<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Employment2 extends Model
{
    protected $fillable = ['applicant_id', 'issuing_authority_name', 'issuing_authority_address', 'issuing_authority_country',
        'issuing_authority_state', 'issuing_authority_city', 'issuing_authority_country_code', 'issuing_authority_phone',
        'reason_for_leaving', 'issuing_authority_email', 'issuing_authority_website', 'nature_of_employment',
        'employment_from', 'employment_to', 'designation', 'employee_code', 'department', 'experience_letter'];


    public function Applicant_Employment2()
    {
        return $this->belongsTO('App\Admin\Applicant', 'applicant_id');
    }
}
