<?php

class LearnersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
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
							$subject_percentage[$subject_name] = round(($subject->scores->sum('user_score')/$subject->scores->sum('total_questions'))*100, 2);
						}
					}
				}
				
		return View::make('frontend.accounts.index')
					->with('percentages', $subject_percentage);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend.accounts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		# validate details
		$validator = Validator::make(Input::all(), User::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		# save in database
		$learner = new User;
		$learner->first_name = Input::get('first_name');
		$learner->last_name = Input::get('last_name');
		$learner->email = Input::get('email');
		$learner->password = Hash::make(Input::get('password'));

		// $photo = Input::file('user_photo');

		// if ( Input::hasFile('user_photo') ) {
		// 	$filename = time()."-".$photo->getClientOriginalName();
		// 	$path = public_path('assets/img/learners/'.$filename);
		// 	Image::make($image->getRealPath())->resize(100, 100)->save($path);
		// 	$learner->user_photo = 'assets/img/learners/'.$filename;
		// }

		$learner->save();

		# save role as learner
		$learner->roles()->attach(2);

		# redirect to login
		return Redirect::to('/learner/login')
				->with('success', 'Your account has been created! You can now log in');


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
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::to('/teacher/mystudents');
	}


}
