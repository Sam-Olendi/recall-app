<?php

class QuestionsController extends \BaseController {


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($subject_id, $exercise_id)
	{
		return View::make('backend.questions.create')
					->with('subject_id', $subject_id)
					->with('exercise_id', $exercise_id)
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

		// $image = Input::file('question_image');

		// if(Input::hasFile('question_image')){
		// 	$filename = time()."-".$image->getClientOriginalName();
		// 	$path = public_path('assets/img/questions/'.$filename);
		// 	Image::make($image->getRealPath())->resize(100, 100)->save($path);
		// 	$exercise->exercise_icon = 'assets/img/questions/'.$filename;
		// }

		$image = Input::file('question_image');
		$filename = time()."-".$image->getClientOriginalName();
		$path = public_path('/assets/img/questions/'.$filename);
		Image::make($image->getRealPath())->save($path);
		$question->question_image = 'assets/img/questions/'.$filename;

		$question->save();

		$question = Question::orderBy('id', 'desc')->first(['id']);
		$question = $question['id'];

		$answer1 = new Answer;
		$answer1->answer_text = Input::get('answer_text_1');
		$answer1->answer_correct = 1;
		$answer1->question_id = $question;
		$answer1->save();

		$answer2 = new Answer;
		$answer2->answer_text = Input::get('answer_text_2');
		$answer2->answer_correct = 0;
		$answer2->question_id = $question;
		$answer2->save();

		$answer3 = new Answer;
		$answer3->answer_text = Input::get('answer_text_3');
		$answer3->answer_correct = 0;
		$answer3->question_id = $question;
		$answer3->save();

		return Redirect::to('/subjects/' . $subject_id . '/exercises/' . $exercise_id)
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
	public function edit($subject_id, $exercise_id, $question_id)
	{
		$correct_answer = Answer::where('question_id', '=', $question_id)
								->where('answer_correct', '=', 1)
								->get();
		$correct_answer = $correct_answer[0];

		$other_answer_1 = Answer::where('question_id', '=', $question_id)
								->where('answer_correct', '=', 0)
								->first();

		return View::make('backend.questions.edit')
				->with('subject_id', $subject_id)
				->with('exercise', Exercise::find($exercise_id))
				->with('question', Question::find($question_id))
				->with('correct_answer', $correct_answer)
				->with('other_answer_1', $other_answer_1);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($subject_id, $exercise_id, $question_id)
	{
		$validator = Validator::make(Input::all(), Question::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$question = Question::find($question_id);
		$question->question_text = Input::get('question_text');
		$question->exercise_id = $exercise_id;

		$image = Input::file('question_image');
		$filename = time()."-".$image->getClientOriginalName();
		$path = public_path('/assets/img/questions/'.$filename);
		Image::make($image->getRealPath())->save($path);
		$question->question_image = 'assets/img/questions/'.$filename;

		$question->save();

		// Update the answers

		return Redirect::to('/subjects/' . $subject_id . '/exercises/' . $exercise_id)
			->with('success', 'The question has succesfully been updated');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($subject_id, $exercise_id, $question_id)
	{

		Answer::where('question_id', '=', $question_id)->delete();

		Question::destroy($question_id);

		return Redirect::to('/subjects/'.$subject_id.'/exercises/'.$exercise_id);
	}


}
