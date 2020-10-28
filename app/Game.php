<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table ='games';

    protected $fillable = [
        'name',
        'serie',
        'gender',

        'plataform',
        'developer',
        'publisher',

        'director',
        'productor',
        'release_date',
        
        'admin_verification',
    ];
    
    // public function users()
    // {
    //     return $this->belongsTo('App\User');
    // }
    
    public function lists()
    {
        return $this->belongsToMany('App\ListM', 'list_game', 'list_id', 'game_id');
    }

    public function plataforms()
    {
        return $this->belongsToMany('App\Plataform', 'game_plataform', 'game_id', 'plataform_id');
    }

    public function genders()
    {
        return $this->belongsToMany('App\Gender', 'game_gender', 'game_id', 'gender_id');
    }
    

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
