<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburl extends Model
{
    protected $fillable = [
        'sid',
        'suburl'
    ];

    public function sites()
    {
        return $this->belongsTo('App\Site', 'sid', 'id');
    }
}
