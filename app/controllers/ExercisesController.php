<?php

class ExercisesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$exercises = Exercise::where('user_id', '=', Auth::user()->id)->paginate(5);
		$query = Request::get('q');

		if ($query) {
			$exercises = Exercise::where('exercise_name', 'LIKE', "%$query%")->paginate(5);
		}

		return View::make('backend.exercises.index')
				->with('exercises', $exercises);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($subject_id)
	{
		return View::make('backend.exercises.create')
				->with('subject', Subject::find($subject_id));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($subject_id)
	{
		$validator = Validator::make(Input::all(), Exercise::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$exercise = new Exercise;
		$exercise->exercise_name = Input::get('exercise_name');
		$exercise->exercise_description = Input::get('exercise_description');
		$exercise->subject_id = $subject_id;
		$exercise->user_id = Auth::user()->id;

		// $image = Input::file('exercise_icon');

		// if(Input::hasFile('exercise_icon')){
		// 	$filename = time()."-".$image->getClientOriginalName();
		// 	$path = public_path('assets/img/exercises/'.$filename);
		// 	Image::make($image->getRealPath())->resize(100, 100)->save($path);
		// 	$exercise->exercise_icon = 'assets/img/exercises/'.$filename;
		// }

		$exercise->save();

		return Redirect::to('/teacher/myexercises')
			->with('success', 'The subject has succesfully been created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($subject_id, $exercise_id)
	{
		$exercise = Exercise::findorFail($exercise_id);
		$questions = $exercise->questions;
		$answers = $exercise->answers;

		return View::make('backend.exercises.show')
			->with('subject_id', $subject_id)
			->with('exercise', $exercise)
			->with('questions', $questions)
			->with('answers', $answers);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($subject_id, $exercise_id)
	{
		return View::make('backend.exercises.edit')
			->with('subject', Subject::find($subject_id))
			->with('exercise', Exercise::find($exercise_id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($subject_id, $exercise_id)
	{
		$validator = Validator::make(Input::all(), Exercise::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$exercise = Exercise::find($exercise_id);
		$exercise->exercise_name = Input::get('exercise_name');
		$exercise->exercise_description = Input::get('exercise_description');
		$exercise->subject_id = $subject_id;
		$exercise->user_id = Auth::user()->id;

		// $image = Input::file('exercise_icon');

		// if(Input::hasFile('exercise_icon')){
		// 	$filename = time()."-".$image->getClientOriginalName();
		// 	$path = public_path('assets/img/exercises/'.$filename);
		// 	Image::make($image->getRealPath())->resize(100, 100)->save($path);
		// 	$exercise->exercise_icon = 'assets/img/exercises/'.$filename;
		// }

		$exercise->save();

		return Redirect::to('/teacher/myexercises')
			->with('success', 'The subject has succesfully been updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($subject_id, $exercise_id)
	{
		Exercise::destroy($exercise_id);
		return Redirect::to('/subjects/{{$subject_id}}/exercises');
	}


}
