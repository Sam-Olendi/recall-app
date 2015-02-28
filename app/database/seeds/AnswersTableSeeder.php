<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		Answer::create([
			'answer_text'		=> 'This is answer 1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'This is answer 2',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'This is answer 3',
			'answer_correct'	=> 1,
			'question_id'		=> 1
		]);
	}

}