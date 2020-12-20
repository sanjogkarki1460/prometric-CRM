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
    	self::create($data);
    }
}
