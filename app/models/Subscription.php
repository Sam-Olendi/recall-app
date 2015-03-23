<?php

class Subscription extends \Eloquent {
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('User', 'learner_id');
	}
}