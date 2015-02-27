<?php

class Exercise extends \Eloquent {

	protected $guarded = [];

	public static $rules = [];

	public function subject()
	{
		return $this->belongsTo('Subject');
	}
}