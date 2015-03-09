<?php

class BooksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Book::all();
		$query = Request::get('q');

		if ($query) {
			$books = Book::where('book_title', 'LIKE', "%$query%")->get();
		}

		return View::make('backend.books.index')
				->with('books',$books);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('backend.books.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Book::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$book = new Book;
		$book->book_title = Input::get('book_title');
		$book->author = Input::get('author');
		$book->publisher = Input::get('publisher');
		$book->ISBN = Input::get('ISBN');

		if ( Input::hasFile('book_link') ) {
			$book->book_link = Input::file('book_link')->getClientOriginalName();
			$book_link = Input::file('book_link');
			$book_link->move('public/assets/books', $book_link->getClientOriginalName());
		}

		if ( Input::hasFile('book_cover') ) {
			$book->book_cover = Input::file('book_cover')->getClientOriginalName();
			$book_cover = Input::file('book_cover');
			$book_cover->move('public/assets/books', $book_cover->getClientOriginalName());
		}

		$book->save();

		return Redirect::to('teacher/mybooks');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('backend.books.edit')
				->with('book', Book::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Book::$rules);

		if ( $validator->fails() ) {
			return Redirect::back()->withInput()->withErrors($validator->messages());
		}

		$book = Book::find($id);
		$book->book_title = Input::get('book_title');
		$book->author = Input::get('author');
		$book->publisher = Input::get('publisher');
		$book->ISBN = Input::get('ISBN');

		if ( Input::hasFile('book_link') ) {
			$book->book_link = Input::file('book_link')->getClientOriginalName();
			$book_link = Input::file('book_link');
			$book_link->move('public/assets/books', $book_link->getClientOriginalName());
		}

		if ( Input::hasFile('book_cover') ) {
			$book->book_cover = Input::file('book_cover')->getClientOriginalName();
			$book_cover = Input::file('book_cover');
			$book_cover->move('public/assets/books', $book_cover->getClientOriginalName());
		}

		$book->save();

		return Redirect::to('teacher/mybooks');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Book::destroy($id);

		return Redirect::to('/teacher/mybooks')
				->with('success', 'The book has succesfully been deleted');
	}


}
