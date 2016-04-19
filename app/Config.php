<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'uid',
        'sid',
        'susid',
        'images',
        'description'
    ];

    public function configs()
    {
        return $this->belongsTo('App\Site', 'sid', 'id');
    }

}
