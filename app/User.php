<?php namespace App;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;
use Cartalyst\Sentinel\Users\EloquentUser;

class User extends EloquentUser {


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	* To allow soft deletes
	*/
	use SoftDeletes;

    protected $dates = ['deleted_at'];

	public function sites()
	{
		return $this->hasOne('App\Site', 'sid', 'id');
	}

    public function groups()
    {
        return $this->hasOne('App\Group', 'group_id', 'id');
    }

	public function urequests()
	{
		return $this->hasMany('App\Urequest', 'uid', 'id');
	}

    public function umessages()
    {
        return $this->hasMany('App\Umessage', 'uid', 'id');
    }

}
