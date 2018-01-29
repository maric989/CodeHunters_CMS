<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function likeable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function getDefinition(){
        return $this->belongsTo(Definition::class, 'likeable_id', 'id');
    }

    public function getPoster(){
        return $this->belongsTo(Poster::class, 'likeable_id', 'id');
    }
}
