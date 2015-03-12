@extends('layouts.backend')

@section('heading')
	<a href="/teacher/mysubjects"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Edit Subject
@stop

@section('content')
	{{ Form::open(['method' => 'put', 'route' => ['subjects.update', $subject->id]]) }}
		<div class="form-group">
			{{ Form::label('subject_name', 'Subject name:') }} <br>
			{{ Form::text('subject_name', $subject->subject_name, ['class' => 'form-input']) }}		
		</div>
		<div class="form_group">
			{{ Form::label('subject_description') }}
			{{ Form::textarea('subject_description', $subject->subject_description, ['class' => 'form-input']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Update subject', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop