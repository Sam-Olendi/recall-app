@extends('layouts.backend')

@section('heading')
	Add New Book
@stop

@section('content')
		{{ Form::open(['route' => 'books.store', 'files' => true]) }}
		<div class="form-group">
			{{ Form::label('book_link', 'Upload book:') }} <br>
			{{ Form::file('book_link', '', ['class' => 'form-input']) }} <br>
			{{ $errors->first('book_link', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('book_cover', 'Upload image:') }} <br>
			{{ Form::file('book_cover', '', ['class' => 'form-input']) }} <br>
			{{ $errors->first('book_cover', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('book_title', 'Book Title:') }} <br>
			{{ Form::text('book_title', '', ['placeholder' => 'Book Title', 'class' => 'form-input']) }} <br>
			{{ $errors->first('book_title', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('author', 'Author:') }} <br>
			{{ Form::text('author', '', ['placeholder' => 'Author', 'class' => 'form-input']) }} <br>
			{{ $errors->first('author', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('publisher', 'Publisher:') }} <br>
			{{ Form::text('publisher', '', ['placeholder' => 'Publisher', 'class' => 'form-input']) }} <br>
			{{ $errors->first('publisher', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('ISBN', 'ISBN:') }} <br>
			{{ Form::text('ISBN', '', ['placeholder' => 'ISBN', 'class' => 'form-input']) }} <br>
			{{ $errors->first('ISBN', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Create book', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop