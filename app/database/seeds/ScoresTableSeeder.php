<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScoresTableSeeder extends Seeder {

	public function run()
	{

		# Jon
		// EXERCISE 1
		Score::create([
			'exercise_id'		=> 1,
			'subject_id'		=> 1,
			'user_id'			=> 1,
			'total_questions'	=> 10,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 1,
			'subject_id'		=> 1,
			'user_id'			=> 1,
			'total_questions'	=> 10,
			'user_score'		=> 3
		]);


		// EXERCISE 2
		Score::create([
			'exercise_id'		=> 2,
			'subject_id'		=> 1,
			'user_id'			=> 1,
			'total_questions'	=> 6,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 2,
			'subject_id'		=> 1,
			'user_id'			=> 1,
			'total_questions'	=> 6,
			'user_score'		=> 3
		]);

		// EXERCISE 3
		Score::create([
			'exercise_id'		=> 3,
			'subject_id'		=> 2,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 3,
			'subject_id'		=> 2,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 3
		]);


		// EXERCISE 4
		Score::create([
			'exercise_id'		=> 4,
			'subject_id'		=> 2,
			'user_id'			=> 1,
			'total_questions'	=> 6,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 4,
			'subject_id'		=> 2,
			'user_id'			=> 1,
			'total_questions'	=> 6,
			'user_score'		=> 3
		]);

		
		// EXERCISE 5
		Score::create([
			'exercise_id'		=> 5,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 3
		]);

		Score::create([
			'exercise_id'		=> 5,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 2
		]);

		// EXERCISE 6
		Score::create([
			'exercise_id'		=> 6,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 6,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 5,
			'user_score'		=> 1
		]);

		// EXERCISE 7
		Score::create([
			'exercise_id'		=> 7,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 8,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 7,
			'subject_id'		=> 3,
			'user_id'			=> 1,
			'total_questions'	=> 8,
			'user_score'		=> 1
		]);


		# Alison

		// EXERCISE 1
		Score::create([
			'exercise_id'		=> 1,
			'subject_id'		=> 1,
			'user_id'			=> 3,
			'total_questions'	=> 10,
			'user_score'		=> 7
		]);

		Score::create([
			'exercise_id'		=> 1,
			'subject_id'		=> 1,
			'user_id'			=> 3,
			'total_questions'	=> 10,
			'user_score'		=> 1
		]);

		// EXERCISE 2
		Score::create([
			'exercise_id'		=> 2,
			'subject_id'		=> 1,
			'user_id'			=> 3,
			'total_questions'	=> 6,
			'user_score'		=> 6
		]);

		Score::create([
			'exercise_id'		=> 2,
			'subject_id'		=> 1,
			'user_id'			=> 3,
			'total_questions'	=> 6,
			'user_score'		=> 2
		]);

		// EXERCISE 3
		Score::create([
			'exercise_id'		=> 3,
			'subject_id'		=> 2,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 3,
			'subject_id'		=> 2,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 3
		]);

		// EXERCISE 4
		Score::create([
			'exercise_id'		=> 4,
			'subject_id'		=> 2,
			'user_id'			=> 3,
			'total_questions'	=> 6,
			'user_score'		=> 3
		]);

		Score::create([
			'exercise_id'		=> 4,
			'subject_id'		=> 2,
			'user_id'			=> 3,
			'total_questions'	=> 6,
			'user_score'		=> 3
		]);

		// EXERCISE 5
		Score::create([
			'exercise_id'		=> 5,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 4
		]);

		Score::create([
			'exercise_id'		=> 5,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 0
		]);

		// EXERCISE 6
		Score::create([
			'exercise_id'		=> 6,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 3
		]);

		Score::create([
			'exercise_id'		=> 6,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 5,
			'user_score'		=> 1
		]);

		// EXERCISE 7
		Score::create([
			'exercise_id'		=> 7,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 8,
			'user_score'		=> 5
		]);

		Score::create([
			'exercise_id'		=> 7,
			'subject_id'		=> 3,
			'user_id'			=> 3,
			'total_questions'	=> 8,
			'user_score'		=> 4
		]);
	}
}