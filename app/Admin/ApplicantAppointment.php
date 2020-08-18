<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ApplicantAppointment extends Model
{
    protected $fillable=['applicant_id','appointment_with','date','time','remarks'];

    public function Applicant_Appointment(){
        return $this->belongsTo('App\Admin\Applicant','applicant_id');
    }

    public function Applicant_Admin()
    {
        return $this->belongsTO('App\Admin\Admin', 'appointment_with');
    }
}
