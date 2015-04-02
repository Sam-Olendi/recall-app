@extends('layouts.backend')

@section('heading')
My Books
@stop

@section('content')
<div class="right btn-top">
	<p>Search for book</p>
	{{ Form::open(['method' => 'get']) }}
		<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go btn-hover-tools']) }}
		</div>
	{{ Form::close() }}
</div>

<a href="/books/create" class="btn btn-go">
	+ Add New Book
</a>



<hr>


<div>
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Author</th>
				<th>Publisher</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($books as $book)
			<tr>
				<th>
				@if($book->book_cover != null)
				<img src="/assets/books/{{ $book->book_cover }}" height="50px">
				@else
				<div style="height: 50px; width: 35px; background-color: #ddd;"></div>
				@endif
				</th>
				<th> {{ $book->book_title }} </th>
				<th class="table-description"> {{ $book->author }} </th>
				<th class="table-description"> {{ $book->publisher }} </th>
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

	{{ $books->links() }}
</div>

@stop