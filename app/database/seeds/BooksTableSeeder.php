<?php

class BooksTableSeeder extends Seeder {

	public function run()
	{
		Book::create([
			'book_title'	=> 'Oliver Twist',
			'author'		=> 'Charles Dickens',
			'publisher'		=> 'Penguin Books',
			'ISBN'			=> '934-342-49'
		]);

		Book::create([
			'book_title'	=> 'Alice in Wonderland',
			'author'		=> 'Lewis Caroll',
			'publisher'		=> 'Macmillan Publishers',
			'ISBN'			=> '393-432-22123'
		]);
	}

}