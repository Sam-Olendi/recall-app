<?php

class LearnersSubjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
