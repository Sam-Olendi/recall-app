<?php

class Subject extends \Eloquent {
	protected $guarded = [];

	public static $rules = [
		'subject_name'			=> 'required|unique:subject_name',
		'subject_description'	=> 'min:10'
	];
}