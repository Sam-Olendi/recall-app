
<?php

class StudentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $role =  Role::find(2);
		// $users = $role->users;

		$users = Subscription::where('teacher_id', '=', Auth::user()->id)->paginate(5);
		$query = Request::get('q');

		if ($query) {
			$results = User::where('first_name', 'LIKE', "%$query%")
						->orWhere('last_name', 'LIKE', "%$query%")
						->get();
		} else {
			$results = null;
		}

		return View::make('backend.students.index')
					->with('users', $users)
					->with('results', $results);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.students.create');
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
		$learner->save();

		# save role as learner
		$learner->roles()->attach(2);

		$learner_id = User::orderBy('id', 'desc')->first(['id']);

		$learner_id = $learner_id['id'];

		# subscribe teacher to learner
		$subscription = new Subscription;
		$subscription->teacher_id = Auth::user()->id;
		$subscription->learner_id = $learner_id;
		$subscription->save();

		# redirect to login
		return Redirect::to('/teacher/mystudents')
				->with('success', 'The student has successfully been created');
	}

	public function subscribe()
	{
		$query = Request::get('q');

		if ($query) {
			$users = User::where('first_name', 'LIKE', "%$query%")
								->orWhere('last_name', 'LIKE', "%$query%")
								->get();	
		} else {
			$users = null;
		}

		return View::make('backend.students.subscribe', compact('users'));
	}


	public function storeSubscription($learner_id)
	{
		$subscription = Subscription::firstOrCreate([
			'teacher_id' => Auth::user()->id,
			'learner_id' => $learner_id
		]);

		return Redirect::to('/teacher/dashboard')
					->with('success', 'You are now following the learner. You will be able to see all their results');
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
		return View::make('backend.students.edit')
				->with('user', User::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		# validate details
		$validator = Validator::make(Input::all(), User::$editRules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$email = User::find($id);
		$email = $email->email;

		# save in database
		$learner = User::find($id);
		$learner->first_name = Input::get('first_name');
		$learner->last_name = Input::get('last_name');
		$learner->email = $email;
		$learner->password = Hash::make(Input::get('password'));
		$learner->save();

		# save role as learner
		$learner->roles()->attach(2);

		# redirect to login
		return Redirect::to('/teacher/mystudents')
				->with('success', 'The student has successfully been reset');
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
