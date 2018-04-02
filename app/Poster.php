<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function createdAtSerbian()
    {
        $created_at = $this->created_at->diffForHumans();
        $created_at = str_replace([' seconds', ' second'], ' sekundi', $created_at);
        $created_at = str_replace([' minutes', ' minute'], ' minuta', $created_at);
        $created_at = str_replace([' hours', ' hour'], ' Sata', $created_at);
        $created_at = str_replace([' months', ' month'], ' Meseca', $created_at);
        $created_at = str_replace([' ago' ], ' ', $created_at);

        if(preg_match('(years|year)', $created_at)){
            $created_at = $this->created_at->toFormattedDateString();
        }

        return $created_at;
    }
}
