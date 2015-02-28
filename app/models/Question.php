<?php

class Question extends \Eloquent {

	protected $guarded = [];

	public static $rules = [
		'question_text'		=> 'required'
	];

	public function exercise()
	{
		return $this->belongsTo('Exercise');
	}

	public function answers()
	{
		return $this->hasMany('Answer');
	}
	
}