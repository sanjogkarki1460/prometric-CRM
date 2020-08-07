<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    protected $fillable=['To','user_type','message'];
}
