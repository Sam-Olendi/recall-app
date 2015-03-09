@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> Library </h3>
	<div class="subjects">
		@foreach($books as $book)
			<div class="subject-back left">
				<div>
					@if( $book->book_icon != null )
					<img src="/{{ $book->book_icon }}" width="70px" class="book-icon">
					@else
					<img src="/assets/img/book.jpg" class="book-icon">
					@endif
				</div>
				<h4> <a href="{{ asset('assets/books/' . $book->book_link) }}"> {{ $book->book_title }} </a> </h4>
				<p class="subject-description"> {{ $book->author }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop