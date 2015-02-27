<?php

class Role extends \Eloquent {
	protected $guarded = [];

	public function users()
	{
		return $this->belongsToMany('User');
	}
}