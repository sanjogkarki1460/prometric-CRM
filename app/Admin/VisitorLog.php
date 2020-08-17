<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable=['visited_by','applicant_id','enquiry_id','date','time','porpose','remarks'];

    public function Applicant_Visitor()
    {
        return $this->belongsTo('App\Admin\Applicant', 'applicant_id');
    }

    public function Enquiry_Visitor()
    {
        return $this->belongsTo('App\Admin\enquiry', 'enquiry_id');
    }
}
