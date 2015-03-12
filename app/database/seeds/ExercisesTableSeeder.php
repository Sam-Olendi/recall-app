<?php

class ExercisesTableSeeder extends Seeder {

	public function run()
	{
		Exercise::create([
			'exercise_name'			=> 'Numbers',
			'exercise_description'	=> 'Ready. Set. Go! Learn how to have fun with numbers.',
			'subject_id'			=> 1
		]);

		Exercise::create([
			'exercise_name'			=> 'Numbers II',
			'exercise_description'	=> 'Learn more about numbers.',
			'subject_id'			=> 1
		]);

		Exercise::create([
			'exercise_name'			=> 'Communication',
			'exercise_description'	=> 'Do you know how to talk to your friends?',
			'subject_id'			=> 2
		]);

		Exercise::create([
			'exercise_name'			=> 'Good Manners',
			'exercise_description'	=> 'Learn how to get along with your friends.',
			'subject_id'			=> 2
		]);

		
	}

}