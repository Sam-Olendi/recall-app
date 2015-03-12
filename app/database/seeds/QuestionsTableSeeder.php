<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		#1
		Question::create([
			'question_text'	=> '1 + 1 =',
			'exercise_id'	=> 1
		]);

		#2
		Question::create([
			'question_text'	=> '2 + 2 =',
			'exercise_id'	=> 1
		]);

		#3
		Question::create([
			'question_text'	=> '10 + 10 =',
			'exercise_id'	=> 2
		]);

		#4
		Question::create([
			'question_text'	=> '15 + 15 =',
			'exercise_id'	=> 2
		]);

		#5
		Question::create([
			'question_text'	=> 'What do you say to your friend in the morning?',
			'exercise_id'	=> 3
		]);

		#6
		Question::create([
			'question_text'	=> 'What do you say to your friend in the evening?',
			'exercise_id'	=> 3
		]);

		#7
		Question::create([
			'question_text'	=> 'What do you say when you make a mistake?',
			'exercise_id'	=> 4
		]);

		#8
		Question::create([
			'question_text'	=> 'What do you say after you sneeze?',
			'exercise_id'	=> 4
		]);

	}

}