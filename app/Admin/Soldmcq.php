<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\MCQ;
use App\Admin\Enquiry;
class Soldmcq extends Model
{
    protected $guarded=[];


    public function getAll()
    {
    	return self::get();
    }
    
    public function soldMCQStore($data)
    {
    	self::create($data);
    }


     public function mcq()
    {
    	return $this->belongsTo(MCQ::class,'mcqId');
    }

    public function enquiry()
    {
    	return $this->belongsTo(Enquiry::class,'enquiryId');
    }
}
