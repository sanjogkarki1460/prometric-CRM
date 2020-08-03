<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable=['first_name','last_name','middle_name','email','phone', 'address', 'subject', 'qualification_level',
        'experience', 'country_interested', 'service_interested', 'enquiry_from', 'source', 'remarks', 'responded_through','eligibility','Category_id'];

    public function Category_Enquiry()
    {
        return $this->belongsTO('App\Admin\Category', 'Category_id');
    }

    public function Applicant()
    {
        return $this->hasOne('App\Admin\Applicant');
    }
}
