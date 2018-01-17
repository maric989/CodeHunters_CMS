<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function definicije()
    {
        return $this->belongsTo(Definition::class,'post_id', 'id');
    }
}
