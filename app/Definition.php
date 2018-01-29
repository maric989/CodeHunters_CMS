<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
