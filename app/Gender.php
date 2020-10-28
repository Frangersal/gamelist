<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table ='genders';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    public function games()
    {
        return $this->belongsTo('App\Game');
    }
}
