@extends('layouts.backend')

@section('heading')
	<a href="/teacher/mysubjects"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Add New Subject
@stop

@section('content')
		{{ Form::open(['route' => 'subjects.store', 'files' => true]) }}
		<div class="form-group">
			{{ Form::label('subject_name', 'Subject Name:') }} <br>
			{{ Form::text('subject_name', '', ['placeholder' => 'Subject Name', 'class' => 'form-input']) }} <br>
			{{ $errors->first('subject_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('subject_description', 'Subject Description:') }} <br>
			{{ Form::textarea('subject_description', '', ['placeholder' => 'Subject Description', 'class' => 'form-input']) }} <br>
			{{ $errors->first('subject_description', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Create subject', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop