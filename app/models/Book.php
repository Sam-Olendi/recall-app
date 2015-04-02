<?php

class Book extends \Eloquent {
	
	protected $guarded = [];

	public static $rules = [
		'book_title'	=> 'required|unique:books',
		'author'		=> "required|min:2|max:30|regex:[^[\p{L}\s'.-]+$]",
		'publisher'		=> 'required',
		'ISBN'			=> 'min:3',
		'book_link'		=> 'required|mimes:pdf'
	];
}