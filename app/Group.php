<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = 'users_groups';

    public function users()
    {
        return $this->belongsTo('App\User', 'group_id', 'id');
    }

}
