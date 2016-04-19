<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urequest extends Model
{
    protected $fillable = [
        'uid',
        'sid',
        'type',
        'description',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    public function sites()
    {
        return $this->belongsTo('App\Site', 'sid', 'id');
    }
}
