<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class MCQ extends Model
{
    protected $guarded=[];


    public function getAll()
    {
    	return self::get();
    }


    public function MCQStore($data)
    {
    	$data['status']=$this->status($data['noofsets']);
    	self::create($data);
    }

    public function status($noofset)
    {
    	if($noofset<=0)
    		return $data['status']=0;
    	else
    		return $data['status']=1;
    }
}
