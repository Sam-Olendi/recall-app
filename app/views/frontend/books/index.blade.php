@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> Library <br> <small>Choose a book to read from the ones below</small> </h3>
	<div class="subjects">
		@foreach($books as $book)
			<div class="subject-back left">
				<div>
					@if( $book->book_cover != null )
					<img src="/assets/books/{{ $book->book_cover }}" width="70px">
					@else
					<img src="/assets/img/book.jpg" class="book-icon">
					@endif
				</div>
				<h4> <a href="{{ asset('assets/books/' . $book->book_link) }}" target="_blank"> {{ $book->book_title }} </a> </h4>
				<p class="subject-description"> {{ $book->author }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop