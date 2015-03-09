<?php

class Role extends \Eloquent {
	protected $guarded = [];

	public function users()
	{
		return $this->belongsToMany('User', 'role_user', 'role_id', 'user_id');
	}
}