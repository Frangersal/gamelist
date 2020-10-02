<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    
    protected $table ='ratings';

    
    protected $fillable = [
        'rating',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function games()
    {
        return $this->belongsTo('App\Game');
    }
}
