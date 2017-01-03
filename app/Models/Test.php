<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table="test";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function report()
    {
        return $this->belongsToMany('App\Models\UserReport')->withPivot('result');
    }
}