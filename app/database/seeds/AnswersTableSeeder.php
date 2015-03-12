<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		# Question 1
		Answer::create([
			'answer_text'		=> '3',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> '1',
			'answer_correct'	=> 0,
			'question_id'		=> 1
		]);

		Answer::create([
			'answer_text'		=> '2',
			'answer_correct'	=> 1,
			'question_id'		=> 1
		]);


		# Question 2
		Answer::create([
			'answer_text'		=> '5',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> '2',
			'answer_correct'	=> 0,
			'question_id'		=> 2
		]);

		Answer::create([
			'answer_text'		=> '4',
			'answer_correct'	=> 1,
			'question_id'		=> 2
		]);


		# Question 3
		Answer::create([
			'answer_text'		=> '21',
			'answer_correct'	=> 0,
			'question_id'		=> 3
		]);

		Answer::create([
			'answer_text'		=> '10',
			'answer_correct'	=> 0,
			'question_id'		=> 3
		]);

		Answer::create([
			'answer_text'		=> '20',
			'answer_correct'	=> 1,
			'question_id'		=> 3
		]);


		# Question 4
		Answer::create([
			'answer_text'		=> '15',
			'answer_correct'	=> 0,
			'question_id'		=> 4
		]);

		Answer::create([
			'answer_text'		=> '43',
			'answer_correct'	=> 0,
			'question_id'		=> 4
		]);

		Answer::create([
			'answer_text'		=> '30',
			'answer_correct'	=> 1,
			'question_id'		=> 4
		]);


		# Question 5
		Answer::create([
			'answer_text'		=> 'Good morning',
			'answer_correct'	=> 1,
			'question_id'		=> 5
		]);

		Answer::create([
			'answer_text'		=> 'Good afternoon',
			'answer_correct'	=> 0,
			'question_id'		=> 5
		]);

		Answer::create([
			'answer_text'		=> 'Good evening',
			'answer_correct'	=> 0,
			'question_id'		=> 5
		]);


		# Question 6
		Answer::create([
			'answer_text'		=> 'Good evening',
			'answer_correct'	=> 1,
			'question_id'		=> 6
		]);

		Answer::create([
			'answer_text'		=> 'Good afternoon',
			'answer_correct'	=> 0,
			'question_id'		=> 6
		]);

		Answer::create([
			'answer_text'		=> 'Good morning',
			'answer_correct'	=> 0,
			'question_id'		=> 6
		]);


		# Question 7
		Answer::create([
			'answer_text'		=> "I'm sorry",
			'answer_correct'	=> 1,
			'question_id'		=> 7
		]);

		Answer::create([
			'answer_text'		=> "You're welcome" ,
			'answer_correct'	=> 0,
			'question_id'		=> 7
		]);

		Answer::create([
			'answer_text'		=> 'Good day!',
			'answer_correct'	=> 0,
			'question_id'		=> 7
		]);


		# Question 8
		Answer::create([
			'answer_text'		=> 'Excuse me',
			'answer_correct'	=> 1,
			'question_id'		=> 8
		]);

		Answer::create([
			'answer_text'		=> 'Bless you',
			'answer_correct'	=> 0,
			'question_id'		=> 8
		]);

		Answer::create([
			'answer_text'		=> "You're welcome" ,
			'answer_correct'	=> 0,
			'question_id'		=> 8
		]);

		
	}

}