<?php

class LearnersBooksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('frontend.books.index')
					->with('books', Book::all());
	}


}
