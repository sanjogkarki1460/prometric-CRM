<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded=[];



    public function getAll()
    {
    	return self::get();
    }

    public function bookStore($data)
    {
    	$data['status']=$this->status($data['qty']);
    	self::create($data);
    }

    public function status($qty)
    {
    	if($qty<=0)
    		return $data['status']=0;
    	else
    		return $data['status']=1;
    }
}
