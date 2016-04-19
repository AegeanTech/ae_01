<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    public function states()
    {
        return $this->hasOne('App\State', 'sid', 'sid');
    }
}
