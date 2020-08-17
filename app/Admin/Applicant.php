<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['first_name', 'middel_name', 'surname', 'maiden_name', 'gender', 'dob', 'identity_type', 'identity_card_no',
        'passport_no', 'birth_country', 'country_code', 'mobile_no', 'current_country', 'nationality', 'email', 'passport_docs',
        'applicant_category', 'services_id', 'enquired', 'enquired_id', 'progress_sts'];

    public function Category_Applicant()
    {
        return $this->belongsTO('App\Admin\Category', 'applicant_category');
    }

    public function Enquiry_Applicant()
    {
        return $this->belongsTo('App\Admin\Enquiry', 'enquired_id');
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
}

