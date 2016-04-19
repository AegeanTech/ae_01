<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umessage extends Model
{
    protected $fillable = [
        'uid',
        'sid',
        'type',
        'description',
        'triggered_at',
        'status',
        'state'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }
}
