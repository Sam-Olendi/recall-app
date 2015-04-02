<?php

class PerformancesController extends \BaseController {

	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teacher_id = Auth::user()->id;
		$count = Subscription::where('teacher_id', '=', $teacher_id)->count();

		return View::make('backend.performances.index', compact('count'));
	}

	public function showLearners()
	{
		$teacher_id = Auth::user()->id;
		$count = Subscription::where('teacher_id', '=', $teacher_id)->count();
		$learners_list = Subscription::where('teacher_id', '=', $teacher_id)->get();

		$learners = [];

		foreach ($learners_list as $learner) {
			$learner_id = $learner->learner_id;
			$scores_count = Score::where('user_id', '=', $learner_id)->count();

			$learner;

			if ( $scores_count > 7 ) {
				$learners[] = $learner;
			}

			$learners;
		}

		$query = Request::get('q');

		if ($query) {
			$users = User::where('first_name', 'LIKE', "%$query%")
								->orWhere('last_name', 'LIKE', "%$query%")
								->get();			
		} else {
			$users = null;
		}


		return View::make('backend.performances.learners')
						->with('users', $users)
						->with('learners', $learners_list);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function overall()
	{
		// $scores = Score::distinct()->groupBy('user_id')->get();
		$teacher_id = Auth::user()->id;
		
		$count = Subscription::where('teacher_id', '=', $teacher_id)->count();
		
		if ( $count != 0 ) {
			$learners = Subscription::where('teacher_id', '=', $teacher_id)->get();
		} else {
			$learners = null;
		};

		$query = Request::get('q');


		if ($query) {
			$users = User::where('first_name', 'LIKE', "%$query%")
								->orWhere('last_name', 'LIKE', "%$query%")
								->get();			
		} else {
			$users = null;
		}

		# Overall performance per subject
		// Get subject scores and group by performance.
		$subject_performance = DB::table('scores')
							->select(DB::raw('subject_id, sum(user_score) as scores, sum(total_questions) as totals, count(user_score) as count'))
							->groupBy('subject_id')
							->get();

		# Overall best and worst performing subjects
		$subject_number = DB::table('subjects')->orderBy('id', 'desc')->lists('id');
		$j = $subject_number[0]; // delimiter
		$score_per_subject = [];

		for ($i=0; $i < $j; $i++) { 
			$subject_score = array_get($subject_performance, $i);
			$score_per_subject[$subject_score->subject_id] = round(($subject_score->scores/$subject_score->totals)*100, 2);
		}

		// Best performing subject
		arsort($score_per_subject);
		$best_score = array_slice($score_per_subject, 0, 1, true);

		// Worst performing subject
		asort($score_per_subject);
		$worst_score = array_slice($score_per_subject, 0, 1, true);


		# Performance per learner
		// Get scores and group by user id
		$learner_performance = DB::table('scores')
									->select(DB::raw('user_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
									->groupBy('user_id')
									->get();

		$score_per_user = [];

		# Best and poorest performing student
		foreach ($learner_performance as $key => $value) {
			$score_per_user[$value->user_id] = $value->percentage;
		}

		// Best performing student
		arsort($score_per_user);
		$best_student = array_slice($score_per_user, 0, 1, true);

		// Poorest performing student
		asort($score_per_user);
		$worst_student = array_slice($score_per_user, 0, 1, true);

		# Top 5 learners
		arsort($score_per_user);
		$top_three_students = array_slice($score_per_user, 0, 3, true);


		# Best and worst performing exercises
		// Get exercise scores and group by exercise id
		$exercise_performance = DB::table('scores')
							->select(DB::raw('exercise_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
							->groupBy('exercise_id')
							->get();

		$score_per_exercise = [];

		foreach ($exercise_performance as $key => $value) {
			$score_per_exercise[$value->exercise_id] = $value->percentage;
		}

		// Best performing exercise
		arsort($score_per_exercise);
		$best_exercise = array_slice($score_per_exercise, 0, 1, true);

		// Worst performing exercise
		asort($score_per_exercise);
		$worst_exercise = array_slice($score_per_exercise, 0, 1, true);


		# Overall Learner Performance
		$overall_scores = DB::table('scores')
								->select(DB::raw('user_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage, count(user_score) as count'))
								->groupBy('user_id')
								->orderBy('user_id', 'desc')
								->get();


		return View::make('backend.performances.overall')
				// ->with('scores', $scores)
				->with('users', $users)
				->with('learners', $learners)
				->with('subject_performance', $subject_performance)
				->with('best_score', $best_score)
				->with('worst_score', $worst_score)
				->with('best_student', $best_student)
				->with('worst_student', $worst_student)
				->with('top_three_students', $top_three_students)
				->with('best_exercise', $best_exercise)
				->with('worst_exercise', $worst_exercise)
				->with('overall_scores', $overall_scores);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getSubjects()
	{
		return View::make('backend.performance.subjects');
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($user_id)
	{

		$score = Score::where('user_id', '=', $user_id)->get();

		if ($score->isEmpty()) {
			
			return View::make('backend.performances.none')
					->with('user', User::find($user_id));

		} else {
			$scores = Score::where('user_id', '=', $user_id)->take(5)->get();

		$subjects = [];

		foreach (Subject::all() as $subject) {
			$subjects[$subject->id] = $subject->subject_name;
		}

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
					$subject_percentage[$subject_name] = round(($subject->scores->sum('user_score')/$subject->scores->sum('total_questions'))*100, 2);
				}
			}
		}

		# Performance per subject
		// get all scores that belong to a user and group according to subject
		$subject_scores = DB::table('scores')
					->select(DB::raw('subject_id, sum(user_score) as scores, sum(total_questions) as totals'))
					->where('user_id', '=', $user_id)
					->groupBy('subject_id')
					->get();

		return View::make('backend.performances.show')
					->with('user', User::find($user_id))
					->with('scores', $scores)
					->with('subjects', $subjects)
					->with('percentages', $subject_percentage)
					->with('subject_scores', $subject_scores);
		}

		
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
		if ( $userscores == 0 || $totalscores == 0 ) {
			$percentage = null;
		} else {
			$percentage = round(($userscores / $totalscores) * 100, 2); //percentage score	
		}

		$subject_count = DB::table('scores')
							->select(DB::raw('count(user_score) as count'))
							->where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->groupBy('subject_id')
							->get();

		# Scores for most recent exercises in said subject
		$scores = $subjects->take(5);

		$scores_all = Score::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->get();
		
		$dates = Score::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->get(['date']);
		$dates = $dates->lists('date');

		$graph_dates = [];

		foreach ($dates as $date) {
			$graph_dates[] = $date;
		}

		# Performance per exercise
		$exercise_scores = DB::table('scores')
							->select(DB::raw('exercise_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage, count(user_score) as count'))
							->where('user_id', '=', $user_id)
							->where('subject_id', '=', $subject_id)
							->groupBy('exercise_id')
							->orderBy('percentage', 'desc')
							->get();

	
		# Highest and lowest scores in said subject respectively
		$high_score = Highscore::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->orderBy('percentage', 'desc')
							->first();

		if ($high_score != null) {
			$high_score_percentage = $high_score->percentage;
		} else {
			$high_score_percentage = null;
		}

		$high_exercise_id = Highscore::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->orderBy('percentage', 'desc')
							->get(['exercise_id'])
							->first();
		$high_exercise_id = $high_exercise_id['exercise_id'];

		$high_exercise = Exercise::find($high_exercise_id);
		
		$low_score = Lowscore::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->orderBy('percentage', 'asc')
							->first();

		if ($low_score != null) {
			$low_score_percentage = $low_score->percentage;
		} else {
			$low_score_percentage = null;
		}

		$low_exercise_id = Lowscore::where('subject_id', '=', $subject_id)
							->where('user_id', '=', $user_id)
							->orderBy('percentage')
							->get(['exercise_id'])
							->first();
		$low_exercise_id = $low_exercise_id['exercise_id'];
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
					->with('subjects', $subjects)
					->with('user', $user)
					// ->with('highest_score', $highest_score)
					// ->with('high_total_questions', $high_total_questions)
					->with('high_score_percentage', $high_score_percentage)
					->with('high_score', $high_score)
					->with('high_exercise', $high_exercise)
					->with('low_score_percentage', $low_score_percentage)
					->with('low_score', $low_score)
					->with('low_exercise', $low_exercise)
					->with('recent_score', $recent_score)
					// ->with('dates', $scores_all->lists('created_at'))
					->with('dates', $graph_dates)
					// ->with('dates', $dates)
					->with('scores_all', $scores_all->lists('user_score'))
					->with('questions', $scores_all->lists('total_questions'))
					->with('exercise_scores', $exercise_scores)
					->with('subject_count', $subject_count);
	}


	public function results($user_id)
	{
		$user = User::find($user_id);

		return View::make('backend.performances.results')
					->with('user', $user);
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
