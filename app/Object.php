<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{

    public function sites()
    {
        return $this->belongsToMany('App\Site');
    }

}
