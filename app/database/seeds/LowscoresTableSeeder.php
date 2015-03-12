<?php

class LowscoresTableSeeder extends Seeder {

	public function run()
	{
		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'low_score'			=> 3,
			'total_questions'	=> 10,
			'percentage'		=> 30.00
		]);

		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'low_score'			=> 3,
			'total_questions'	=> 10,
			'percentage'		=> 30.00
		]);

		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'low_score'			=> 3,
			'total_questions'	=> 10,
			'percentage'		=> 30.00
		]);

		Lowscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'low_score'			=> 3,
			'total_questions'	=> 10,
			'percentage'		=> 30.00
		]);
	}

}