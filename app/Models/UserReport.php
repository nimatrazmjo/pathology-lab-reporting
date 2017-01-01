<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserReport extends Model
{
    /**
     * Has relationship with user table
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }
}