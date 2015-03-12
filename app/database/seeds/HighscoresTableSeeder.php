<?php

class HighscoresTableSeeder extends Seeder {

	public function run()
	{
		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 1,
			'high_score'		=> 4,
			'total_questions'	=> 10,
			'percentage'		=> 40.00
		]);

		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 1,
			'exercise_id'		=> 2,
			'high_score'		=> 4,
			'total_questions'	=> 10,
			'percentage'		=> 40.00
		]);

		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 3,
			'high_score'		=> 4,
			'total_questions'	=> 10,
			'percentage'		=> 40.00
		]);

		Highscore::create([
			'user_id'			=> 1,
			'subject_id'		=> 2,
			'exercise_id'		=> 4,
			'high_score'		=> 4,
			'total_questions'	=> 10,
			'percentage'		=> 40.00
		]);
	}

}