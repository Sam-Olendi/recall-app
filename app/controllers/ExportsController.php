<?php

class ExportsController extends \BaseController {

	public function overall(){

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
								->select(DB::raw('subject_id, sum(user_score) as scores, sum(total_questions) as totals'))
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
			$top_five_students = $score_per_user;


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

			$pdf = App::make('dompdf');
			$pdf->loadView('backend.exports.overall', compact('learners', 'users', 'subject_performance', 'best_score', 'worst_score', 'best_student', 'worst_student', 'top_five_students', 'best_exercise', 'worst_exercise'));
			return $pdf->download();

	}


	public function report($user_id){

		$user = User::find($user_id);

		# Performance per subject
		// Get scores for user, group by subject_id
		$subject_scores = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('subject_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('subject_id')
								->orderBy('percentage', 'desc')
								->get();

		# Best and worst performing subject
		$best_subject = array_slice($subject_scores, 0, 1, true);

		$worst_subject = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('subject_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('subject_id')
								->orderBy('percentage')
								->get();
		$worst_subject = array_slice($worst_subject, 0, 1, true);
		

		# Performance per exercise
		// Get scores for user, group by exercise_id
		$exercise_scores = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('exercise_id, subject_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage, count(user_score) as count'))
								->groupBy('exercise_id')
								->orderBy('percentage', 'desc')
								->get();

		# Best and worst performing exercise
		$best_exercise = array_slice($exercise_scores, 0, 1, true);

		$worst_exercise = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('exercise_id, subject_id, round((sum(user_score)/sum(total_questions))*100, 2) as percentage, count(user_score) as count'))
								->groupBy('exercise_id')
								->orderBy('percentage')
								->get();

		$worst_exercise = array_slice($worst_exercise, 0, 1, true);

		# Most performed subject
		$popular_subject = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('subject_id, count(user_score) as count, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('subject_id')
								->orderBy('count', 'desc')
								->get();

		$popular_subject = array_slice($popular_subject, 0, 1, true);

		# Least performed subject
		$unpopular_subject = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('subject_id, count(user_score) as count, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('subject_id')
								->orderBy('count')
								->get();

		$unpopular_subject = array_slice($unpopular_subject, 0, 1, true);

		# Most performed exercise
		$popular_exercise = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('exercise_id, subject_id, count(user_score) as count, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('exercise_id')
								->orderBy('count', 'desc')
								->get();

		$popular_exercise = array_slice($popular_exercise, 0, 1, true);

		# Least performed exercise
		$unpopular_exercise = DB::table('scores')
								->where('user_id', '=', $user_id)
								->select(DB::raw('exercise_id, subject_id, count(user_score) as count, round((sum(user_score)/sum(total_questions))*100, 2) as percentage'))
								->groupBy('exercise_id')
								->orderBy('count')
								->get();
								
		$unpopular_exercise = array_slice($unpopular_exercise, 0, 1, true);

		$pdf = App::make('dompdf');
		$pdf->loadView('backend.exports.report', compact('user', 'subject_scores', 'exercise_scores', 'best_subject', 'worst_subject', 'best_exercise', 'worst_exercise', 'popular_exercise', 'unpopular_exercise', 'popular_subject', 'unpopular_subject'));
		return $pdf->download();

	}

}