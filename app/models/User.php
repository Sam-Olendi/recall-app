<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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

	public static $rules = [
		'first_name'	=> 'required|min:2|alpha',
		'last_name'		=> 'required|alpha',
		'email'			=> 'email|required|unique:users',
		'password'		=> 'required|min:4',
		'user_photo'	=> 'mimes:jpg,jpeg,gif,png,bmp'
	];

	protected $guarded = [];

	public function roles(){
		return $this->belongsToMany('Role');
	}

}
