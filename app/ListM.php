<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListM extends Model
{
    protected $table ='lists';

    protected $fillable = [
        'name',
        'private',
    ];
    
    public function games()
    {
        return $this->belongsToMany('App\Game', 'list_game', 'list_id', 'game_id');
    }
}
