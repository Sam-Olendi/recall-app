<?php

class LowscoresTableSeeder extends Seeder {

	public function run()
	{
		# Jon
		// EXERCISE 1
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 3,
			'total_questions'	=> 10,
			'percentage'		=> 30.00
		]);

		// EXERCISE 2
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 3
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 3,
			'total_questions'	=> 5,
			'percentage'		=> 60.00
		]);
		
		// EXERCISE 4
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 5
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'low_score'			=> 2,
			'total_questions'	=> 5,
			'percentage'		=> 40.00
		]);

		// EXERCISE 6
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'low_score'			=> 1,
			'total_questions'	=> 5,
			'percentage'		=> 20.00
		]);

		// EXERCISE 7
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'low_score'			=> 1,
			'total_questions'	=> 8,
			'percentage'		=> 12.50
		]);



		# Alison
		// EXERCISE 1
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 1,
			'total_questions'	=> 10,
			'percentage'		=> 10.00
		]);

		// EXERCISE 2
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 2,
			'total_questions'	=> 6,
			'percentage'		=> 33.33
		]);

		// EXERCISE 3
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 3,
			'total_questions'	=> 5,
			'percentage'		=> 60.00
		]);

		// EXERCISE 4
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 5
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'low_score'			=> 0,
			'total_questions'	=> 5,
			'percentage'		=> 00.00
		]);

		// EXERCISE 6
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'low_score'			=> 1,
			'total_questions'	=> 5,
			'percentage'		=> 20.00
		]);

		// EXERCISE 7
		Lowscore::create([
			'user_id'			=> 3,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'low_score'			=> 4,
			'total_questions'	=> 8,
			'percentage'		=> 50.00
		]);




		# Angela
		// EXERCISE 1
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 6,
			'total_questions'	=> 10,
			'percentage'		=> 60.00
		]);

		// EXERCISE 2
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 1,
			'total_questions'	=> 6,
			'percentage'		=> 16.67
		]);

		// EXERCISE 3
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 4
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 5
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'low_score'			=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 6
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'low_score'			=> 2,
			'total_questions'	=> 5,
			'percentage'		=> 40.00
		]);

		// EXERCISE 7
		Lowscore::create([
			'user_id'			=> 4,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'low_score'			=> 7,
			'total_questions'	=> 8,
			'percentage'		=> 87.5
		]);



		# Wesley
		// EXERCISE 1
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 5,
			'total_questions'	=> 10,
			'percentage'		=> 50.00
		]);

		// EXERCISE 2
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 3,
			'total_questions'	=> 6,
			'percentage'		=> 50.00
		]);

		// EXERCISE 3
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 2,
			'total_questions'	=> 5,
			'percentage'		=> 40.00
		]);

		// EXERCISE 4
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 4,
			'total_questions'	=> 6,
			'percentage'		=> 66.67
		]);

		// EXERCISE 5
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'low_score'			=> 2,
			'total_questions'	=> 5,
			'percentage'		=> 40.00
		]);

		// EXERCISE 6
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'low_score'			=> 1,
			'total_questions'	=> 5,
			'percentage'		=> 20.00
		]);

		// EXERCISE 7
		Lowscore::create([
			'user_id'			=> 5,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'low_score'			=> 7,
			'total_questions'	=> 8,
			'percentage'		=> 12.5
		]);




		# Raphael
		// EXERCISE 1
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 8,
			'total_questions'	=> 10,
			'percentage'		=> 80.00
		]);

		// EXERCISE 2
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 4,
			'total_questions'	=> 6,
			'percentage'		=> 66.67
		]);

		// EXERCISE 3
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 4
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 4,
			'total_questions'	=> 6,
			'percentage'		=> 66.67
		]);

		// EXERCISE 5
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 3,
			'exercise_id'		=> 5,
			'low_score'			=> 4,
			'total_questions'	=> 5,
			'percentage'		=> 80.00
		]);

		// EXERCISE 6
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 3,
			'exercise_id'		=> 6,
			'low_score'			=> 3,
			'total_questions'	=> 5,
			'percentage'		=> 60.00
		]);

		// EXERCISE 7
		Lowscore::create([
			'user_id'			=> 6,
			'subject_id'		=> 3,
			'exercise_id'		=> 7,
			'low_score'			=> 5,
			'total_questions'	=> 8,
			'percentage'		=> 62.5
		]);
		
	}

}