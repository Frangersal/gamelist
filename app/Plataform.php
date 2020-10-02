<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plataform extends Model
{
    protected $table ='plataforms';

    protected $fillable = [
        'name',
        'description',
        'imagen',
    ];

    
    public function games()
    {
        return $this->belongsTo('App\Game');
    }
}
