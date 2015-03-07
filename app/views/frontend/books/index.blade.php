@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> Library </h3>
	<div class="subjects">
		@foreach($books as $book)
			<div class="subject-back left">
				<div>
					<img src="" class="subject-icon">
				</div>
				<h4> <a href="{{ asset('assets/books/' . $book->book_link) }}"> {{ $book->book_title }} </a> </h4>
				<p class="subject-description"> {{ $book->author }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop