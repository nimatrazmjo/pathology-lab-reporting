<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var string
     */
    protected $table ="roles";

    /**
     * User has relation with roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
       return $this->belongsToMany('App\users','role_id','user_id');
    }
}