<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['first_name','last_name','middle_name','pp_photo','email','phone','maiden_name','gender','dob','address',
        'subject','Category_id','qualification_level','experience','country_interested','service_interested','identity_type',
        'citizen_no','passport_no','birth_country','country_code','current_country','nationality','passport_docs',
        'identity_card_no','passport_no','birth_country','country_code','current_country','nationality','passport_docs',
        'progress_sts','status','remarks','color_code'];



    public function Category_Applicant()
    {
        return $this->belongsTO('App\Admin\Category', 'Category_id');
    }

    public function CheckList()
    {
        return $this->HasMany('App\Admin\CheckList');
    }

    public function Education()
    {
        return $this->HasMany('App\Admin\Education');
    }

    public function Education2()
    {
        return $this->HasMany('App\Admin\Education2');
    }

    public function HealthLisence()
    {
        return $this->HasMany('App\Admin\HealthLisence');
    }

    public function Employemnt()
    {
        return $this->HasMany('App\Admin\Employemnt');
    }

    public function Employemnt2()
    {
        return $this->HasMany('App\Admin\Employemnt2');
    }

    public function Employemnt3()
    {
        return $this->HasMany('App\Admin\Employemnt3');
    }

    public function Employemnt4()
    {
        return $this->HasMany('App\Admin\Employemnt4');
    }

    public function Employemnt5()
    {
        return $this->HasMany('App\Admin\Employemnt5');
    }

    public function ProgressFlow()
    {
        return $this->HasMany('App\Admin\ProgressFlow');
    }

    public function ApplicantAppointment()
    {
        return $this->HasMany('App\Admin\ApplicantAppointment');
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

