<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		Answer::create([
			'answer_text'		=> 'Answer a for Question 1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 1',
			'answer_correct'	=> 1,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> 'Answer a for Question 2',
			'answer_correct'	=> 1,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 2',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 2',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> 'Answer a for Question 3',
			'answer_correct'	=> 1,
			'question_id'		=> 3
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 3',
			'answer_correct'	=> 0,
			'question_id'		=> 3
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 3',
			'answer_correct'	=> 0,
			'question_id'		=> 3
		]);

		Answer::create([
			'answer_text'		=> 'Answer a for Question 4',
			'answer_correct'	=> 1,
			'question_id'		=> 4
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 4',
			'answer_correct'	=> 0,
			'question_id'		=> 4
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 4',
			'answer_correct'	=> 0,
			'question_id'		=> 4
		]);

		Answer::create([
			'answer_text'		=> 'Answer a for Question 5',
			'answer_correct'	=> 1,
			'question_id'		=> 5
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 5',
			'answer_correct'	=> 0,
			'question_id'		=> 5
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 5',
			'answer_correct'	=> 0,
			'question_id'		=> 5
		]);

		Answer::create([
			'answer_text'		=> 'Answer a for Question 6',
			'answer_correct'	=> 1,
			'question_id'		=> 6
		]);

		Answer::create([
			'answer_text'		=> 'Answer b for Question 6',
			'answer_correct'	=> 0,
			'question_id'		=> 6
		]);

		Answer::create([
			'answer_text'		=> 'Answer c for Question 6',
			'answer_correct'	=> 0,
			'question_id'		=> 6
		]);




	}

}