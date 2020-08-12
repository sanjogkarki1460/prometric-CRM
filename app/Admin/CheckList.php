<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $fillable=['applicant_id','mrp_size_photo','passport','citizen','slc_marksheet','slc_character_certificate','slc_certificate',
        'plus2certificate','plus2transcript','plus2character_certificate','diploma_certificate','diploma_transcript','diploma_character_certificate',
        'equivalent_certificate','council_registration_certificate_front','council_registration_certificate_back',
        'council_good_standing_letter','work_experience_letter1','work_experience_letter2','work_experience_letter3',
        'basic_life_support_certificate','signed_letter_authorization','signed_service_agreement',];

    public function Applicant_CheckList(){
        return $this->belongsTo('App\Admin\Applicant','applicant_id');
    }
}


