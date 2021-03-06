<?php

class LearnersSessionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('frontend.accounts.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = ['email' => 'required|email', 'password' => 'required|min:6'];
		$validator = Validator::make(Input::all(), $rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$attempt = Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]);

		if ( $attempt ) {
			return Redirect::intended('/learner/classroom');
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

		return Redirect::to('/learner/login');
	}


}
