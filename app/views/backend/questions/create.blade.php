@extends('layouts.backend')

@section('heading')
	<a href="#"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	{{ $exercise->exercise_name}}: Add New Question
@stop

@section('content')
		{{ Form::open(['route' => ['subjects.exercises.questions.store', $subject_id, $exercise->id]]) }}
			<div class="form-group">
				{{ Form::label('question_text', 'Question:') }} <br>
				{{ Form::textarea('question_text', '', ['placeholder' => 'Question', 'class' => 'form-input']) }} <br>
				{{ $errors->first('question_text', '<span class="error">:message</span> ') }}
			</div>
			<div class="form-group">
				{{ Form::label('question_image', 'Image:') }} <br>
				{{ Form::file('question_image') }} <br>
				{{ $errors->first('question_image', '<span class="error">:message</span> ') }}
			</div>
			<div class="form-group">
				{{ Form::submit('Add question', ['class' => 'btn btn-go']) }}
			</div>
		{{ Form::close() }}
@stop