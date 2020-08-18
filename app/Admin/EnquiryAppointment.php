<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class EnquiryAppointment extends Model
{
    protected $fillable=['enquiry_id','date','appointment_with','time','remarks'];

    public function Enquiry_Appointment()
    {
        return $this->belongsTO('App\Admin\Enquiry', 'enquiry_id');
    }

    public function Enquiry_Admin()
    {
        return $this->belongsTO('App\Admin\Admin', 'appointment_with');
    }
}
