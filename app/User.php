<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function definition()
    {
        return $this->hasMany('App\Definition');
    }

    public function posters()
    {
        return $this->hasMany('App\Poster');
    }

    //Sve sto je user likovao
    public function getAllLikes()
    {
        $likes = Like::where('user_id',$this->id)
            ->where('up','1')
            ->get();
        return count($likes);
    }

    //Sve postere koje je lajkovao
    public function getAllPosterLikes()
    {
        $likes = Like::where('user_id',$this->id)
            ->where('likeable_type','App\Poster')
            ->where('up','1')
            ->get();
        return count($likes);
    }

    //Sve definicije koje je lajkovao
    public function getAllDefinitionLikes()
    {
        $likes = Like::where('user_id',$this->id)
            ->where('likeable_type','App\Definition')
            ->where('up','1')
            ->get();
        return count($likes);
    }

    public function getDefinitionLiked()
    {
        $result = [
            'def_count' => 0
        ];

        $definitions = $this->definition()->get();

        foreach ($definitions as $definition)
        {
            $likes_def = Like::where('likeable_id',$definition->id)
                ->where('likeable_type','App\Definition')
                ->where('up','1')
                ->count();

            $result['def_count'] += $likes_def;
        }
        return $result['def_count'];
    }

    public function getPosterLiked()
    {
        $result = [
            'poster_count' => 0
        ];

        $definitions = $this->posters()->get();

        foreach ($definitions as $definition)
        {
            $likes_def = Like::where('likeable_id',$definition->id)
                ->where('likeable_type','App\Poster')
                ->where('up','1')
                ->count();

            $result['poster_count'] += $likes_def;
        }
        return $result['poster_count'];
    }
}
