<?php

class SubjectsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$subjects = Subject::all();
		$query = Request::get('q');

		if ($query) {
			$subjects = Subject::where('subject_name', 'LIKE', "%$query%")->get();
		}

		return View::make('backend.subjects.index')
				->with('subjects', $subjects);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.subjects.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Subject::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$subject = new Subject;
		$subject->subject_name = Input::get('subject_name');
		$subject->subject_description = Input::get('subject_description');

		$image = Input::file('subject_icon');

		if(Input::hasFile('subject_icon')){
			$filename = time()."-".$image->getClientOriginalName();
			$path = public_path('assets/img/subjects/'.$filename);
			Image::make($image->getRealPath())->resize(100, 100)->save($path);
			$subject->subject_icon = 'assets/img/subjects/'.$filename;
		}

		$subject->save();

		return Redirect::to('/teacher/mysubjects')
			->with('success', 'The subject has succesfully been created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$subject = Subject::find($id);
		$exercises = $subject->exercises;
		$query = Request::get('q');

		if ($query) {
			$exercises = Exercise::where('subject_id', '=', $id)
								->where('exercise_name', 'LIKE', "%$query%")
								->get();
		}

		return View::make('backend.subjects.show')
			->with('subject', $subject)
			->with('exercises', $exercises);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('backend.subjects.edit')
				->with('subject', Subject::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Subject::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$subject = Subject::find($id);
		$subject->subject_name = Input::get('subject_name');
		$subject->subject_description = Input::get('subject_description');

		$image = Input::file('subject_icon');

		if(Input::hasFile('subject_icon')){
			$filename = time()."-".$image->getClientOriginalName();
			$path = public_path('assets/img/subjects/'.$filename);
			Image::make($image->getRealPath())->resize(100, 100)->save($path);
			$subject->subject_icon = 'assets/img/subjects/'.$filename;
		}

		$subject->save();

		return Redirect::to('/teacher/mysubjects')
			->with('success', 'The subject has succesfully been created');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subject::destroy($id);

		return Redirect::to('/teacher/mysubjects')->with('success', 'The subject has succesfully been deleted');
	}


}
