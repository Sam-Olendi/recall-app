<?php

class Exercise extends \Eloquent {
	
	protected $guarded = [];

	protected $table = 'exercises';

	public static $rules = [
		'exercise_name'			=> 'required',
		'exercise_description'	=> 'min:10'
	];

	public function subject()
	{
		return $this->belongsTo('Subject');
	}

	public function questions()
	{
		return $this->hasMany('Question');
	}

	public function answers()
	{
		return $this->hasManyThrough('Answer', 'Question', 'exercise_id', 'question_id');
	}

	public function scores()
	{
		return $this->hasMany('Score');
	}
}