<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'usr';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','usr_st_fname', 'usr_st_lname','email',
        'usr_dt_birth','usr_st_email','password','usr_st_gender',
        'usr_dt_register','usr_st_province','usr_st_city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usr_st_password', 'remember_token',
    ];
}
