<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		Answer::create([
			'answer_text'		=> 'Numbers I, Answer a for Question 1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Numbers I, Answer b for Question 1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Numbers I, Answer c for Question 1',
			'answer_correct'	=> 1,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Numbers I, Answer a for Question 2',
			'answer_correct'	=> 1,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> 'Numbers I, Answer b for Question 2',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> 'Numbers I, Answer c for Question 2',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);
	}

}