<?php

class Answer extends \Eloquent {

	protected $guarded = [];

	public function question()
	{
		return $this->belongsTo('Question');
	}

}