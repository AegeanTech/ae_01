<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
//    protected $table = 'sites';
    protected $fillable = [
        'title',
        'name',
        'vatn',
        'doy',
        'address',
        'phone',
        'site',
        'email',
        'socialf',
        'socialt',
        'sociall',
        'sociali',
        'socialy',
        'logo',
        'descriptionobj',
        'description',
        'slogan',
        'status',
        'lat',
        'lng',
        'theme',
        'city',
        'state',
        'postalcode',
        'background',
        'file',
        'tag',
        'group'
    ];

    public function objects()
    {
        return $this->belongsToMany('App\Object')->withTimestamps();
    }

    public function doys()
    {
        return $this->hasOne('App\Doy', 'doy', 'doy');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'uid', 'id');
    }

    public function suburls()
    {
        return $this->hasMany('App\Suburl', 'sid', 'id');
    }

    public function subscriptions()
    {
        return $this->hasOne('App\Subscription', 'sid', 'id');
    }

    public function urequests()
    {
        return $this->hasMany('App\Urequest', 'sid', 'id');
    }

    public function configs()
    {
        return $this->hasOne('App\Config', 'sid', 'id');
    }
}
