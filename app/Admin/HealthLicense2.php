<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class HealthLicense2 extends Model
{
    protected $fillable=['applicant_id', 'professional_designation' , 'issuing_authority_name' , 'issuing_authority_country',
        'issuing_authority_city' , 'license_conferred_date' , 'license_expiry_date' , 'license_type' , 'license_number' ,
        'license_status' , 'license_attained' , 'license_copy' ,];

    public function Applicant_Health2(){
        return $this->belongsTO('App\Admin\Applicant','applicant_id');
    }
}
