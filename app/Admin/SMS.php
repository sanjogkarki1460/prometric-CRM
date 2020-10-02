<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    protected $fillable=['phone_number','user_type','message'];
}
