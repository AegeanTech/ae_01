<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doy extends Model
{
    public function sites()
    {
        return $this->belongsToMany('App\Site', 'doy', 'doy');
    }
}
