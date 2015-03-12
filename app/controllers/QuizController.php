<?php

class QuizController extends \BaseController {

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
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($subject_id, $exercise_id)
	{
		# make validator


		# get all input
		$user_score = 0;
		foreach(Input::all() as $input) {
			
			if ( $input == 1 ) {
				$user_score = $user_score + 1;
			}

		}

		# count number of rows as total question number
		$question_number = Question::where('exercise_id', '=', $exercise_id)->count();

		# get user's id
		$user_id = Auth::id();

		# save data to database
		$score = new Score;
		$score->exercise_id = $exercise_id;
		$score->subject_id = $subject_id;
		$score->user_id = $user_id;
		$score->total_questions = $question_number;
		$score->user_score = $user_score;
		$score->save();

		# get highest score and if lower than recent score, update
		// $highest_score = Performance::where('exercise_id', '=', $exercise_id)->latest()->get(['highest_score']);
		// $lowest_score = Performance::where('exercise_id', '=', $exercise_id)->latest()->get(['lowest_score']);

		$highest_score = Highscore::where('exercise_id', '=', $exercise_id)->latest()->get(['high_score'])->toArray();
		$highest_score = array_get($highest_score, '0.high_score');


		if ( $highest_score < $user_score ) {
			$highscore = new Highscore;
			$highscore->user_id = $user_id;
			$highscore->subject_id = $subject_id;
			$highscore->exercise_id = $exercise_id;
			$highscore->high_score = $user_score;
			$highscore->total_questions = $question_number;
			$highscore->percentage = round(($user_score/$question_number)*100, 2);
			$highscore->save();
		}

		# get lower score and if higher than recent score, update
		$lowest_score = Lowscore::where('exercise_id', '=', $exercise_id)->latest()->get(['low_score'])->toArray();
		$highest_score = array_get($lowest_score, '0.low_score');

		if ( $lowest_score > $user_score ) {
			$lowscore = new Lowscore;
			$lowscore->user_id = $user_id;
			$lowscore->subject_id = $subject_id;
			$lowscore->exercise_id = $exercise_id;
			$lowscore->low_score = $user_score;
			$lowscore->total_questions = $question_number;
			$lowscore->percentage = round(($user_score/$question_number)*100, 2);
			$lowscore->save();
		}


		return View::make('frontend.exercises.score')
				->with('score', $user_score)
				->with('question_number', $question_number)
				->with('exercise', Exercise::find($exercise_id));

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//validate

		
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
	public function destroy($id)
	{
		//
	}


}
