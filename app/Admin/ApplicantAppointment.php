<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ApplicantAppointment extends Model
{
    protected $fillable=['applicant_id','date','time','remarks'];

    public function Applicant_Appointment(){
        return $this->belongsTo('App\Admin\Applicant','applicant_id');
    }
}
