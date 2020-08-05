<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckList extends Model
{
    protected $fillable=['applicant_id','password_citizenship_certificate','slc_certificate','plus_two_isc_pcl_certificate',
        'diploma_degree_certificate','mark_sheet_of_each_year_final_transcript','equivalent_certificate','council_registration_certificate',
        'council_registration_certificate_renew','good_standing_letter_from_council','work_experience_letter_till_date',
        'basic_life_support_for_nurses','mrp_size_photo_in_white_background'];

    public function Applicant_CheckList(){
        return $this->belongsTo('App\Admin\Applicant','applicant_id');
    }
}


