<?php

class ExercisesTableSeeder extends Seeder {

	public function run()
	{
		#1
		Exercise::create([
			'exercise_name'			=> 'Numbers',
			'exercise_description'	=> 'Ready. Set. Go! Learn how to have fun with numbers.',
			'subject_id'			=> 1,
			'user_id'				=> 2
		]);

		#2
		Exercise::create([
			'exercise_name'			=> 'Numbers II',
			'exercise_description'	=> 'Learn more about numbers.',
			'subject_id'			=> 1,
			'user_id'				=> 2
		]);

		#3
		Exercise::create([
			'exercise_name'			=> 'Communication',
			'exercise_description'	=> 'Do you know how to talk to your friends?',
			'subject_id'			=> 2,
			'user_id'				=> 2
		]);

		#4
		Exercise::create([
			'exercise_name'			=> 'Good Manners',
			'exercise_description'	=> 'Learn how to get along with your friends.',
			'subject_id'			=> 2,
			'user_id'				=> 2
		]);

		#5
		Exercise::create([
			'exercise_name'			=> 'Nouns',
			'exercise_description'	=> 'Choose the noun from the list',
			'subject_id'			=> 3,
			'user_id'				=> 2
		]);

		#6
		Exercise::create([
			'exercise_name'			=> 'Verbs',
			'exercise_description'	=> 'Choose the verb from the list',
			'subject_id'			=> 3,
			'user_id'				=> 2
		]);

		#7
		Exercise::create([
			'exercise_name'			=> 'Adjectives',
			'exercise_description'	=> 'Learn more about adjectives',
			'subject_id'			=> 3,
			'user_id'				=> 2
		]);

		
	}

}