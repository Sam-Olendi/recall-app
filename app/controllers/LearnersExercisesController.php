<?php

class LearnersExercisesController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($subject_id, $exercise_id)
	{
		$subject = Subject::find($subject_id);
		$exercise = Exercise::find($exercise_id);
		$questions = Exercise::find($exercise_id)->questions;
		$answers = Exercise::find($exercise_id)->answers;

		$counter = $answers->count();
		$i = 0;
		$t = 0;
		$v = 1;
		$count = [];

		for ($i=0; $i < $counter; $i++) { 
			
			$t = $t + 1;

			$checkModulus = $t % 3;
			
			if ( $checkModulus == 0){

				$count[$v-1] = 'answer'.$v;
				$v = $v + 1;

			}
				
		}
	
		return View::make('frontend.exercises.show')
					->with('subject', $subject)
					->with('questions', $questions)
					->with('exercise', $exercise)
					->with('answers', $answers)
					->with('count', $count);

	}


}
