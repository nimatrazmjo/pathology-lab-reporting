<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ="roles";

    public function user()
    {
        $this->belongsToMany('App\users','role_id','user_id');
    }
}