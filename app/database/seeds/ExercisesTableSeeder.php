<?php

class ExercisesTableSeeder extends Seeder {

	public function run()
	{
		Exercise::create([
			'exercise_name'			=> 'Numbers',
			'exercise_description'	=> 'Ready. Set. Go! Learn how to have fun with numbers',
			'subject_id'			=> 1
		]);

		Exercise::create([
			'exercise_name'			=> 'Numbers II',
			'exercise_description'	=> 'Learn how to get along with your friends',
			'subject_id'			=> 1
		]);

		Exercise::create([
			'exercise_name'			=> 'Courtesy',
			'exercise_description'	=> 'Learn how to get along with your friends',
			'subject_id'			=> 2
		]);

		Exercise::create([
			'exercise_name'			=> 'Facial expressions',
			'exercise_description'	=> 'Learn how to get along with your friends',
			'subject_id'			=> 2
		]);

		
	}

}