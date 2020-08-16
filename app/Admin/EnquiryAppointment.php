<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class EnquiryAppointment extends Model
{
    protected $fillable=['enquiry_id','date','time','remarks'];

    public function Enquiry_Appointment()
    {
        return $this->belongsTO('App\Admin\Enquiry', 'enquiry_id');
    }
}
