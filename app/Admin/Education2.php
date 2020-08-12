<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Education2 extends Model
{
    protected $fillable=['authority_name', 'authority_address' , 'authority_city', 'authority_state' , 'authority_country',
        'authority_phone_type', 'authority_country_code', 'authority_phone', 'authority_email', 'authority_website',
        'qualification', 'institution','mode', 'major_subject', 'minor_subject', 'roll', 'study_from', 'study_to',
        'conferred_date', 'degree_issue_date', 'expected_degree_issue_date', 'qualification_certificate', 'marksheet',
        'applicant_id'];

    public function Applicant_Education2(){
        return $this->belongsTo('App\Admin\Applicant','applicant_id');
    }
}
