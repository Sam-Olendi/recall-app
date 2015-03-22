<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// EXERCISE 1
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
			'question_text'	=> '4 + 4 =',
			'exercise_id'	=> 1
		]);

		#4
		Question::create([
			'question_text'	=> '2 + 4 =',
			'exercise_id'	=> 1
		]);

		#5
		Question::create([
			'question_text'	=> '4 - 2 =',
			'exercise_id'	=> 1
		]);

		#6
		Question::create([
			'question_text'	=> '3 - 2 =',
			'exercise_id'	=> 1
		]);

		#7
		Question::create([
			'question_text'	=> '7 - 4 =',
			'exercise_id'	=> 1
		]);

		#8
		Question::create([
			'question_text'	=> '9 - 9 =',
			'exercise_id'	=> 1
		]);

		#9
		Question::create([
			'question_text'	=> '0 + 0 =',
			'exercise_id'	=> 1
		]);

		#10
		Question::create([
			'question_text'	=> '1 + 0 =',
			'exercise_id'	=> 1
		]);


		// EXERCISE 2

		#11
		Question::create([
			'question_text'	=> '10 + 10 =',
			'exercise_id'	=> 2
		]);

		#12
		Question::create([
			'question_text'	=> '15 + 15 =',
			'exercise_id'	=> 2
		]);

		#13
		Question::create([
			'question_text'	=> '9 + 10 =',
			'exercise_id'	=> 2
		]);

		#14
		Question::create([
			'question_text'	=> '9 + 9 =',
			'exercise_id'	=> 2
		]);

		#15
		Question::create([
			'question_text'	=> '12 + 6 =',
			'exercise_id'	=> 2
		]);



		// EXERCISE 3

		#16
		Question::create([
			'question_text'	=> 'What do you say to your friend in the morning?',
			'exercise_id'	=> 3
		]);

		#17
		Question::create([
			'question_text'	=> 'What do you say to your friend in the evening?',
			'exercise_id'	=> 3
		]);

		#18
		Question::create([
			'question_text'	=> 'How do you ask to be excused?',
			'exercise_id'	=> 3
		]);

		#19
		Question::create([
			'question_text'	=> 'What do you say to your friend in the afternoon?',
			'exercise_id'	=> 3
		]);

		#20
		Question::create([
			'question_text'	=> 'What do you tell your parents at the end of the day?',
			'exercise_id'	=> 3
		]);


		// EXERCISE 4

		#21
		Question::create([
			'question_text'	=> 'What do you say when you make a mistake?',
			'exercise_id'	=> 4
		]);

		#22
		Question::create([
			'question_text'	=> 'What do you say after you sneeze?',
			'exercise_id'	=> 4
		]);

		#23
		Question::create([
			'question_text'	=> 'When someone needs something?',
			'exercise_id'	=> 4
		]);

		#24
		Question::create([
			'question_text'	=> 'Which one of the following is rude?',
			'exercise_id'	=> 4
		]);

		#25
		Question::create([
			'question_text'	=> 'When someone falls over...',
			'exercise_id'	=> 4
		]);

		#26
		Question::create([
			'question_text'	=> 'When someone looks lonely...',
			'exercise_id'	=> 4
		]);



		// EXERCISE 5

		#27
		Question::create([
			'question_text'	=> 'Which of the following is a noun?',
			'exercise_id'	=> 5
		]);

		#28
		Question::create([
			'question_text'	=> 'Select the noun',
			'exercise_id'	=> 5
		]);

		#29
		Question::create([
			'question_text'	=> 'Which of the following is not a noun?',
			'exercise_id'	=> 5
		]);

		#30
		Question::create([
			'question_text'	=> 'Select the noun',
			'exercise_id'	=> 5
		]);

		#31
		Question::create([
			'question_text'	=> 'Which of the following is a noun?',
			'exercise_id'	=> 5
		]);



		// EXERCISE 6

		#32
		Question::create([
			'question_text'	=> 'Which of the following is a verb?',
			'exercise_id'	=> 6
		]);

		#33
		Question::create([
			'question_text'	=> 'Select the verb',
			'exercise_id'	=> 6
		]);

		#34
		Question::create([
			'question_text'	=> 'Which of the following is not a verb?',
			'exercise_id'	=> 6
		]);

		#35
		Question::create([
			'question_text'	=> 'Select the verb',
			'exercise_id'	=> 6
		]);

		#36
		Question::create([
			'question_text'	=> 'Which of the following is a verb?',
			'exercise_id'	=> 6
		]);



		// EXERCISE 7

		#37
		Question::create([
			'question_text'	=> 'Which of the following is a adjective?',
			'exercise_id'	=> 7
		]);

		#38
		Question::create([
			'question_text'	=> 'Select the adjective',
			'exercise_id'	=> 7
		]);

		#39
		Question::create([
			'question_text'	=> 'Which of the following is not a adjective?',
			'exercise_id'	=> 7
		]);

		#40
		Question::create([
			'question_text'	=> 'Select the adjective',
			'exercise_id'	=> 7
		]);

		#41
		Question::create([
			'question_text'	=> 'Which of the following is a adjective?',
			'exercise_id'	=> 7
		]);

		#42
		Question::create([
			'question_text'	=> 'Adjectives are used to describe...',
			'exercise_id'	=> 7
		]);

		#43
		Question::create([
			'question_text'	=> 'Select the adjective',
			'exercise_id'	=> 7
		]);

		#44
		Question::create([
			'question_text'	=> 'Which of the following is a adjective?',
			'exercise_id'	=> 7
		]);


	}

}