@extends('layouts.backend')

@section('heading')
Student Performance
@stop

@section('content')
<table class="table table-striped table-hover table-row-link">
	<thead>
		<tr>
			<th>#</th>
			<th></th>
			<th>Student</th>
			<th>Exercise</th>
			<th>Score</th>
		</tr>
	</thead>
	<tbody>
		@foreach($scores as $score)
			<tr>
				<th> {{ $score->id }} </th>
				<th>  </th>
				<th> <a href="/teacher/performance/{{ $score->user->id }}"> {{ $score->user->first_name}} {{$score->user->last_name }} </a> </th>
				<th> <b>{{ $score->exercise->subject->subject_name }}:</b> {{ $score->exercise->exercise_name }} </th>
				<th> {{ $score->user_score }} </th>
			</tr>
		@endforeach
	</tbody>
	
</table>
@stop