<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table ='reviews';

    protected $fillable = [
        'title',
        'review',
        'rating',
        'spoiler',
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
