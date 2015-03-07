<?php

class Score extends \Eloquent {

	protected $guarded = [];

	public function user() {
		return $this->belongsTo('User');
	}

	public function exercise(){
		return $this->belongsTo('Exercise');
	}

}