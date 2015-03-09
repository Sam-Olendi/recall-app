<?php

class PerformancesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$scores = Score::all();
		$query = Request::get('q');


		if ($query) {
			$users = User::where('first_name', 'LIKE', "%$query%")
								->orWhere('last_name', 'LIKE', "%$query%")
								->get();			
		} else {
			$users = null;
		}		

		return View::make('backend.performances.index')
				->with('scores', $scores)
				->with('users', $users);
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
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id)
	{
		$scores = Score::where('user_id', '=', $user_id)->take(5)->get();

		$subjects = [];

		foreach (Subject::all() as $subject) {
			$subjects[$subject->id] = $subject->subject_name;
		}

		# Performance per subject
		$subject_number = DB::table('subjects')->orderBy('id', 'desc')->lists('id');
		$j = $subject_number[0]; //delimiter

		$subject_score = [];
		$subject_total_questions = [];
		$subject_percentage = [];

		for ($i=0; $i <= $j; $i++) { 
			if ( $subject = Subject::find($i) ) {
				$subject_name = $subject->subject_name;
				$subject_score[$subject_name] = $subject->scores->sum('user_score');
				$subject_total_questions[$subject_name] = $subject->scores->sum('total_questions');

				if ( $subject_score[$subject_name] != 0 AND $subject_total_questions[$subject_name] !=0 ) {
					$subject_percentage[$subject_name] = ($subject->scores->sum('user_score')/$subject->scores->sum('total_questions'))*100;
				}
			}
		}

		# Best performing subject
		// return arsort($subject_percentage);

		return View::make('backend.performances.show')
					->with('user', User::find($user_id))
					->with('scores', $scores)
					->with('subjects', $subjects)
					->with('percentages', $subject_percentage);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function report($user_id)
	{
		$user = User::find($user_id);
		$subject_id = Input::get('subject_id');
		$subject = Subject::find($subject_id);
		$exercises = $subject->exercises; //gives all the exercises that belong to the subject

		// Returns scores that belong to the user and the chosen subject.
		// Also shows all the exercises that belong to said subject
		$subjects = Score::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->get();

		# Percentage score for the selected subject under the given user id
		$userscores = $subjects->sum('user_score');
		$totalscores = $subjects->sum('total_questions');
		$percentage = ($userscores / $totalscores) * 100; //percentage score

		# Scores for most recent exercises in said subject
		$scores = $subjects->take(5);

		# Highest and lowest scores in said subject respectively
		$highest_score = $subjects->max('user_score');
		$high_total_questions = Highscore::where('subject_id', '=', $subject_id)->latest()->get();
		$high_total_questions_array = $high_total_questions[0];
		$high_total_questions = $high_total_questions_array['total_questions'];
		$high_exercise_id = $high_total_questions_array['exercise_id'];
		$high_exercise = Exercise::find($high_exercise_id);

		$lowest_score = $subjects->min('user_score');
		$low_total_questions = Lowscore::where('subject_id', '=', $subject_id)->latest()->get();
		$low_total_questions_array = $low_total_questions[0];
		$low_total_questions = $low_total_questions_array['total_questions'];
		$low_exercise_id = $low_total_questions_array['exercise_id'];
		$low_exercise = Exercise::find($low_exercise_id);


		# Most recent score
		$recent_score = Score::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->orderBy('id', 'desc')
							->first();

		return View::make('backend.performances.report')
					->with('percentage', $percentage)
					->with('scores', $scores)
					->with('subject', $subject)
					->with('highest_score', $highest_score)
					->with('high_total_questions', $high_total_questions)
					->with('high_exercise', $high_exercise)
					->with('lowest_score', $lowest_score)
					->with('low_total_questions', $low_total_questions)
					->with('low_exercise', $low_exercise)
					->with('recent_score', $recent_score);
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
