<?php

class SubjectsTableSeeder extends Seeder {

	public function run()
	{
		Subject::create([
			'subject_name'			=> 'Mathematics',
			'subject_description'	=> 'Ready. Set. Go! Learn how to have fun with numbers'
		]);

		Subject::create([
			'subject_name'			=> 'Social Skills',
			'subject_description'	=> 'Learn how to get along with your friends'
		]);
	}

}