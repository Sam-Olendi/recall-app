<?php

class HighscoresTableSeeder extends Seeder {

	public function run()
	{
		# Jon
		// EXERCISE 1
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'high_score'		=> 4,
			'total_questions'	=> 10,
			'percentage'		=> 40.00
		]);

		// EXERCISE 2
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'high_score'		=> 4,
			'total_questions'	=> 6,
			'percentage'		=> 66.67
		]);

		// EXERCISE 3
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'high_score'		=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);
		
		// EXERCISE 4
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'high_score'		=> 4,
			'total_questions'	=> 6,
			'percentage'		=> 66.67
		]);		

		// EXERCISE 5
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'high_score'		=> 3,
			'total_questions'	=> 5,
			'percentage'		=> 60.00
		]);

		// EXERCISE 6
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'high_score'		=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 7
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'high_score'		=> 4,
			'total_questions'	=> 8,
			'percentage'		=> 50.00
		]);



		# Alison

		// EXERCISE 1
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'high_score'		=> 7,
			'total_questions'	=> 10,
			'percentage'		=> 70.00
		]);

		// EXERCISE 2
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'high_score'		=> 6,
			'total_questions'	=> 6,
			'percentage'		=> 100.00
		]);

		// EXERCISE 3
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'high_score'		=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 4
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'high_score'		=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 5
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'high_score'		=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 6
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'high_score'		=> 3,
			'total_questions'	=> 5,
			'percentage'		=> 60.00
		]);

		// EXERCISE 7
		Highscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'high_score'		=> 5,
			'total_questions'	=> 8,
			'percentage'		=> 62.50
		]);

	}

}