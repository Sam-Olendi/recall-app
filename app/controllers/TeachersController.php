<?php

class TeachersController extends \BaseController {


	public function index()
	{
		return View::make('backend.accounts.index')
					->with('user', Auth::user());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.accounts.create');
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
		$teacher = new User;
		$teacher->first_name = Input::get('first_name');
		$teacher->last_name = Input::get('last_name');
		$teacher->email = Input::get('email');
		$teacher->password = Hash::make(Input::get('password'));

		// $photo = Input::file('user_photo');

		// if ( Input::hasFile('user_photo') ) {
		// 	$filename = time()."-".$photo->getClientOriginalName();
		// 	$path = public_path('assets/img/teachers/'.$filename);
		// 	Image::make($image->getRealPath())->resize(100, 100)->save($path);
		// 	$teacher->user_photo = 'assets/img/teachers/'.$filename;
		// }

		$teacher->save();

		# save role as teacher
		$teacher->roles()->attach(1);

		# redirect to login
		return Redirect::to('/teacher/login')
				->with('success_message', 'Your account has been created! You can now log in');
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
		$validator = Validator::make(Input::all(), User::$editRules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$email = User::find($id);
		$email = $email->email;

		$user = User::find($id);
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = $email;
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		return Redirect::to('/teacher/dashboard')
				->with('message', 'Your account has successfully been updated');
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

		return Redirect::to('/');
	}


}
