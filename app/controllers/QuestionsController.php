<?php

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($subject_id, $exercise_id)
	{
		return View::make('backend.questions.create')
					->with('subject_id', $subject_id)
					->with('exercise', Exercise::find($exercise_id));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($subject_id, $exercise_id)
	{
		$validator = Validator::make(Input::all(), Question::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$question = new Question;
		$question->question_text = Input::get('question_text');
		$question->exercise_id = $exercise_id;

		$image = Input::file('question_image');

		if(Input::hasFile('question_image')){
			$filename = time()."-".$image->getClientOriginalName();
			$path = public_path('assets/img/questions/'.$filename);
			Image::make($image->getRealPath())->resize(100, 100)->save($path);
			$exercise->exercise_icon = 'assets/img/questions/'.$filename;
		}

		$question->save();

		return Redirect::to('/subjects/{{$subject_id}}/exercises/{{$exercise_id}}')
			->with('success', 'The question has succesfully been created');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($subject_id, $exercise_id, $question_id)
	{
		Question::destroy($question_id);

		return Redirect::to('/subjects/'.$subject_id.'/exercises/'.$exercise_id);
	}


}
