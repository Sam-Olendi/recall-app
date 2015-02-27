@extends('layouts.backend')

@section('heading')
	<a href="/teacher/mysubjects"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Edit Subject
@stop

@section('content')
	{{ Form::open(['url' => 'subjects/' . $subject->id, 'method' => 'put']) }}
		<div class="form-group">
			{{ Form::label('subject_name', 'Subject Name:') }} <br>
			{{ Form::text('subject_name', $subject->subject_name, ['placeholder' => 'Subject Name', 'class' => 'form-input']) }} <br>
			{{ $errors->first('subject_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('subject_icon', 'Subject Icon:') }} <br>
			{{ Form::file('subject_icon') }} <br>
			{{ $errors->first('subject_icon', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('subject_description', 'Subject Description:') }} <br>
			{{ Form::textarea('subject_description', $subject->subject_description, ['placeholder' => 'Subject Description', 'class' => 'form-input']) }} <br>
			{{ $errors->first('subject_description', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Update subject', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop