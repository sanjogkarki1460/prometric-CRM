<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable=['phone_number','user_type','message'];
}
