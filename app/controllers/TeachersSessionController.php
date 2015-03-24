<?php

class TeachersSessionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.accounts.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = ['email' => 'required', 'password' => 'required'];
		$validator = Validator::make(Input::all(), $rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$email =  Input::get('email');
		$user = User::where('email', '=', $email)->get(['id']);

		$user = array_get($user, '0');
		$user_id = $user['id'];

		$user = User::find($user_id)->roles;
		$user = $user[0];
		$user = $user['role'];

		if ( $user != 'teacher' ) {
			return Redirect::to('/')
					->with('flash_message', 'You do not have permission to view the page you requested. Please log in as a learner');
		}

		$attempt = Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]);

		if ( $attempt ) {
			return Redirect::intended('/teacher/dashboard');
		}

		return Redirect::back()->withInput()->with('flash_message', 'You have entered incorrect credentials. Please try again');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/teacher/login');
	}


}
