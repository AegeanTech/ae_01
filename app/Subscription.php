<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'uid',
        'sid',
        'upgraded_at',
        'created_at',
        'ended_at'
    ];

//    protected $dateFormat = 'U';

    public function sites()
    {
        return $this->belongsTo('App\Site', 'sid', 'id');
    }

}
