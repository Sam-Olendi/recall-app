@extends('layouts.backend')

@section('heading')
My Books
@stop

@section('content')
<a href="/books/create" class="btn btn-go btn-top right">
	+ Add New Book
</a>

<div ng-controller="BooksCtrl">
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th>Link</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr>
				<th> {{ $book->id }} </th>
				<th> <img src="{{ $book->book_cover }}"> </th>
				<th> {{ $book->book_title }} </th>
				<th> {{ $book->author }} </th>
				<th class="table-description"> {{ $book->publisher }} </th>
				<th> {{ $book->book_link }} </th>
				<th class="table-tools">
					<a href="/books/{{$book->id}}/edit" class="btn btn-hover-tools btn-default left"> Edit</a>
					{{ Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
					{{ Form::close() }}
				</th>
			</tr>
			@endforeach
		</tbody>
		
	</table>
</div>

@stop