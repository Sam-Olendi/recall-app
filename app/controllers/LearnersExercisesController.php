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
		$exercise = $subject->exercises;
		$questions = Exercise::find($exercise_id)->questions;
		$answers = $subject->answers;

		return View::make('frontend.exercises.show')
					->with('subject', $subject)
					->with('questions', $questions)
					->with('exercise', $exercise)
					->with('answers', $answers);
	}


}
