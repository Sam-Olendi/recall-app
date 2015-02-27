@extends('layouts.backend')

@section('heading')
	<a href="/teacher/myexercises"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	{{ $exercise->exercise_name }}
@stop

@section('content')

<div>

	<a href="/subjects/{{$subject_id}}/exercises/{{$exercise->id}}/questions/create" class="btn btn-go btn-top right">
		+ Add New Question
	</a>

	@foreach($questions as $question)
		<p> {{ $question->question_text }} </p>
		{{ Form::open(['route' => ['subjects.exercises.questions.destroy', $subject_id, $exercise->id, $question->id]]) }}
			{{ Form::submit('Delete question', ['class' => 'btn btn-hover-tools btn-no']) }}
		{{ Form::close() }}
	@endforeach


</div>

@stop