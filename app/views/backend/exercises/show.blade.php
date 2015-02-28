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
		<div class="question-thumbnail left">
			<div class="thumbnail">
		      <img src="{{ $question->question_image }}" alt="...">
		      <div class="caption">
		        <h4>{{ $question->question_text }}</h4>
		        <ul>
		        @foreach($answers as $answer)
		        	<li>{{ $answer->answer_text }}</li>
		        @endforeach
		        </ul>
		        <p>
			        <a href="/subjects/{{$subject_id}}/exercises/{{$exercise->id}}/questions/{{$question->id}}/edit" class="btn btn-default btn-hover-tools left" role="button">Edit</a>
			        {{ Form::open(['route' => ['subjects.exercises.questions.destroy', $subject_id, $exercise->id, $question->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
					{{ Form::close() }}
		        </p>
		      </div>
		    </div>
	    </div>
	@endforeach


</div>

@stop