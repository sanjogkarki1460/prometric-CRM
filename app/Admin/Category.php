<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['Name'];

    public function Enquiry(){
        return $this->hasMany('App\Admin\Enquiry');
    }

    public function Applicant(){
        return $this->hasMany('App\Admin\Applicant');
    }
}
