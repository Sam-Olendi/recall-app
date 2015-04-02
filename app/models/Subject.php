<?php

class Subject extends \Eloquent {

	protected $guarded = [];

	public static $rules = [
		'subject_name'			=> 'required|unique:subjects|min:2|max:20',
		'subject_description'	=> 'min:10'
	];

	public function exercises()
	{
		return $this->hasMany('Exercise');
	}

	public function scores()
	{
		return $this->hasManyThrough('Score', 'Exercise', 'subject_id', 'exercise_id');
	}

}