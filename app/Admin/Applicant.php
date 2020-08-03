<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable=['first_name','middel_name', 'surname' , 'maiden_name', 'gender', 'dob', 'identity_type', 'identity_card_no',
        'passport_no', 'birth_country', 'country_code', 'mobile_no' , 'current_country', 'nationality' , 'email' , 'passport_docs' ,
        'applicant_category' , 'services_id' , 'enquired','enquired_id','progress_sts'];

    public function Category_Applicant()
    {
        return $this->belongsTO('App\Admin\Category', 'applicant_category');
    }

    public function Enquiry_Applicant(){
        return $this->belongsTo('App\Admin\Enquiry','enquired_id');
    }
}
