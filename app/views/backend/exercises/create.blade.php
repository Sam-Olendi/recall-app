@extends('layouts.backend')

@section('heading')
	<a href="/subjects/{{$subject->id}}"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	{{ $subject->subject_name}}: Add New Exercise
@stop

@section('content')
		{{ Form::open(['route' => ['subjects.exercises.store', $subject->id]]) }}
			<div class="form-group">
				{{ Form::label('exercise_name', 'Exercise:') }} <br>
				{{ Form::text('exercise_name', '', ['placeholder' => 'Exercise name', 'class' => 'form-input']) }} <br>
				{{ $errors->first('exercise_name', '<span class="error">:message</span> ') }}
			</div>
			<div class="form-group">
				{{ Form::label('exercise_icon', 'Icon:') }} <br>
				{{ Form::file('exercise_icon') }} <br>
				{{ $errors->first('subject_icon', '<span class="error">:message</span> ') }}
			</div>
			<div class="form-group">
				{{ Form::label('exercise_description', 'Description:') }} <br>
				{{ Form::textarea('exercise_description', '', ['placeholder' => 'Exercise description', 'class' => 'form-input']) }} <br>
				{{ $errors->first('exercise_description', '<span class="error">:message</span> ') }}
			</div>
			<div class="form-group">
				{{ Form::submit('Create exercise', ['class' => 'btn btn-go']) }}
			</div>
		{{ Form::close() }}
@stop