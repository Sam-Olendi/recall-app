@extends('layouts.backend')

@section('heading')
Student Performance: 
@stop

@section('content')
	
	<div>
		<h4>Subject: {{ $subject->subject_name }}</h4>
	</div>

	<div class="row">
		<div class="col-md-8">
			
		</div>
		<div class="col-md-4">
			<h4>Recent Exercise Scores<hr></h4>
			<table class="table table-striped table-hover table-row-link">
				<thead>
					<tr>
						<th>Exercise</th>
						<th>Score (in percentage)</th>
					</tr>
				</thead>
				<tbody>
					@foreach($scores as $score)
					<tr>
						<th> {{ $score->exercise->exercise_name }} </th>
						<th> {{ ($score->user_score/$score->total_questions)*100 }} </th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-4">
			<div class="performance-box">
				<h5 class="perf-box-heading">Percentage performance in {{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h2 class="perf-box-title"> {{ $percentage }}% </h2>
					<p class="perf-box-subtext">  </p>
					<p class="perf-box-subtext"> Most recent score: {{ $recent_score->user_score }} out of {{ $recent_score->total_questions}}</p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="performance-box">
				<h5 class="perf-box-heading">Highest score in {{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h2 class="perf-box-title"> {{ $highest_score }} out of {{ $high_total_questions }} ( {{ ($highest_score/$high_total_questions)*100 }}% ) </h2>
					<p class="perf-box-subtext"> Exercise: {{ $high_exercise->exercise_name }} </p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="performance-box">
				<h5 class="perf-box-heading">Lowest score in {{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h2 class="perf-box-title"> {{ $lowest_score }} out of {{ $low_total_questions }} ( {{ ($lowest_score/$low_total_questions)*100 }}% )</h2>
					<p class="perf-box-subtext"> Exercise: {{ $low_exercise->exercise_name }} </p>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div>
		
	<h4>General Exercise Performance <hr></h4>

		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>#</th>
					<th>Exercise</th>
					<th>Learner's Score</th>
					<th>Out Of</th>
					<th>Percentage Score</th>
				</tr>
			</thead>
			<tbody>
				@foreach($scores as $score)
					<tr>
						<th></th>
						<th> {{ $score->exercise->exercise_name }} </th>
						<th> {{ $score->user_score }} </th>
						<th> {{ $score->total_questions }} </th>
						<th> {{ ($score->user_score/$score->total_questions)*100 }}% </th>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>


@stop