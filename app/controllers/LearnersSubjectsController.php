<?php

class LearnersSubjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $learner_id = Auth::user()->id;
		// $subscriptions = Subscription::where('learner_id', '=', $learner_id)->lists('teacher_id');
		// $teacher_id[] = $subscriptions;
		// $count = count($teacher_id);

		// $subjects = [];

		// for ($i=0; $i < $count; $i++) { 
		// 	$subjects = Subject::where('user_id', '=', $teacher_id)->get();
		// }

		return View::make('frontend.subjects.index')
			->with('subjects', Subject::all());
	}

	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $subject_id
	 * @return Response
	 */
	public function show($subject_id)
	{
		return View::make('frontend.subjects.show')
					->with('subject',  Subject::find($subject_id))
					->with('exercises', Subject::find($subject_id)->exercises);
	}


}
