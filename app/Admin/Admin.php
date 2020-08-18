<?php

namespace App\Admin;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    public function EnquiryAppointment()
    {
        return $this->HasMany('App\Admin\EnquiryAppointment');
    }

    public function ApplicantAppointment()
    {
        return $this->HasMany('App\Admin\ApplicantAppointment');
    }

}
