<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		Question::create([
			'question_text'	=> 'This is a sample question',
			'exercise_id'	=> 1
		]);

		Question::create([
			'question_text'	=> 'This is another sample question',
			'exercise_id'	=> 1
		]);

	}

}