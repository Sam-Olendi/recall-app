<?php

class Book extends \Eloquent {
	
	protected $guarded = [];

	public static $rules = [
		'book_title'	=> 'required',
		'author'		=> "required|min:2|max:30|regex:[^[\p{L}\s'.-]+$]",
		'publisher'		=> 'required',
		'ISBN'			=> 'required|min:3',
		'book_link'		=> 'required|mimes:pdf'
	];
}