<?php

class Subject extends \Eloquent {

	protected $guarded = [];

	public static $rules = [
		'subject_name'			=> 'required:unique',
		'subject_description'	=> 'min:10'
	];

	public function exercises()
	{
		return $this->hasMany('Exercise');
	}

}