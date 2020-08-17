<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable=['first_name','last_name','middle_name','email','phone', 'address', 'subject', 'qualification_level',
        'experience', 'country_interested', 'service_interested', 'enquiry_from', 'source', 'remarks', 'responded_through','eligibility','Category_id',
        'Enquired_date','Office_visited','Visited_date'];

    public function Category_Enquiry()
    {
        return $this->belongsTO('App\Admin\Category', 'Category_id');
    }

    public function Applicant()
    {
        return $this->hasOne('App\Admin\Applicant');
    }

    public function EnquiryAppointment()
    {
        return $this->HasMany('App\Admin\EnquiryAppointment');
    }

    public function IncommingCallLog()
    {
        return $this->HasMany('App\Admin\IncommingCallLog');
    }

    public function OutgoingCallLog()
    {
        return $this->HasMany('App\Admin\OutgoingCallLog');
    }

    public function VisitorLog()
    {
        return $this->HasMany('App\Admin\VisitorLog');
    }

}
