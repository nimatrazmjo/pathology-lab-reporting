<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Monolog\Handler\PushoverHandlerTest;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Has relationship with user_reports table
     */
    public function UserReport()
    {
       return $this->hasMany('App\Models\UserReport');
    }

    /**
     * User has role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function roles()
    {
       return $this->hasOne('App\Models\Role');
    }
}