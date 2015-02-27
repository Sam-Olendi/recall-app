<?php

class Book extends \Eloquent {
	
	protected $guarded = [];

	public static $rules = [
		'book_title'	=> 'required',
		'author'		=> 'string|required',
		'publisher'		=> 'required',
		'ISBN'			=> 'required|min:3',
		'book_link'		=> 'required|mimes:pdf'
	];
}