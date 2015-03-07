<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScoresTableSeeder extends Seeder {

	public function run()
	{
		Score::create([
			'exercise_id'		=> 1,
			'user_id'			=> 1,
			'total_questions'	=> 10,
			'user_score'		=> 1
		]);
	}
}