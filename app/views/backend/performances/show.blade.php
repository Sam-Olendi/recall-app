@extends('layouts.backend')

@section('heading')
Student Performance: {{ $user->first_name }} {{ $user->last_name }}
@stop

@section('content')
	<div>
		<p>Please select a subject to view:</p>
		<p>Subject:</p>
		{{ Form::open(['url' => '/teacher/dashboard/'.$user->id.'/report/']) }}
			{{ Form::select('subject_id', $subjects) }}
			{{ Form::submit('View report', ['class' => 'btn btn-go']) }}
		{{ Form::close() }}
	</div>

	<hr>

	<h4>Percentage performance per subject</h4>

	@foreach ($percentages as $subject => $percentage)
		<div class="performance-box-loop">
			<h4> {{ $subject }} </h4>
			<p> {{ $percentage }}% </p>
		</div>
	@endforeach


	@foreach($subject_scores as $score)
		{{-- {{ $score->subject->subject_name }} --}}
		{{ $score->scores }}
	@endforeach

@stop