<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class IncommingCallLog extends Model
{
    protected $fillable=['call_by','applicant_id','enquiry_id','phone','date','time','length','porpose','remarks'];

    public function Applicant_Incomming()
    {
        return $this->belongsTo('App\Admin\Applicant', 'applicant_id');
    }

    public function Enquiry_Incomming()
    {
        return $this->belongsTo('App\Admin\enquiry', 'enquiry_id');
    }
}
