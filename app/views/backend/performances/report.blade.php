@extends('layouts.backend')
@section('heading')
{{ $user->first_name }} {{ $user->last_name }} Performance: {{ $subject->subject_name }}
@stop
@section('content')

<div class="row">
	<div class="col-md-8">
		<div>
			<h5 class="report-block-title">Score Graph</h5>
			<p class="report-block-subtitle">These are {{ $user->first_name }}'s scores in recently performed exercises.</p>
			<canvas id="report-graph" width="600" height="300">
			
			</canvas>
		</div>
	</div>
	<div class="col-md-4">
		<h5 class="report-block-title">Recent Exercise Scores</h5>
		<p class="report-block-subtitle">These are {{ $user->first_name }}'s scores in recently performed exercises.</p>
		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>Exercise</th>
					<th>Score (Percentage)</th>
				</tr>
			</thead>
			<tbody>
				@foreach($scores as $score)
				<tr>
					<th> <b>{{ $score->exercise->exercise_name }}</b> </th>
					<th> {{ round(($score->user_score/$score->total_questions)*100, 2) }}% </th>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{-- <a href="/teacher/dashboard/{{$user->id}}/report/results" class="btn btn-go btn-hover-tools right">View all results</a> --}}
	</div>
</div>

<hr>

<div class="row">
	<div class="col-md-4">
		<h5 class="report-block-title">Overall performance in {{ $subject->subject_name}}</h5>
		<p class="report-block-subtitle">This is calculated from all the exercises that {{ $user->first_name }} has performed.</p>
		<div class="performance-box">
			<h5 class="perf-box-heading">Percentage performance in {{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h2 class="perf-box-title"> {{ $percentage }}% </h2>
				{{-- <p class="perf-box-subtext"> Best performance: {{ $high_score->high_score }} out of {{ $high_score->total_questions }}</p>
				<p class="perf-box-subtext"> Poorest performance: {{ $low_score->low_score }} out of {{ $low_score->total_questions }}</p> --}}
				{{-- <p class="perf-box-subtext"> Most recent score: {{ $recent_score->user_score }} out of {{ $recent_score->total_questions}}</p> --}}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<h5 class="report-block-title">Most recent exercise performance</h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s last score in the exercise that they last performed.</p>
		<div class="performance-box">
			<h5 class="perf-box-heading">Most recent score in {{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h2 class="perf-box-title">  {{ $recent_score->user_score }}  out of  {{ $recent_score->total_questions}} ( {{ round(($recent_score->user_score / $recent_score->total_questions)*100, 5) }}%) </h2>
				<p class="perf-box-subtext"> Exercise: {{ $low_exercise->exercise_name }} </p>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<h5>Best performance in {{ $subject->subject_name }} </h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s best performance in an exercise in {{ $subject->subject_name}}.</p>
			<h2 class="perf-box-title">{{ round(($high_score->high_score/$high_score->total_questions)*100, 2) }}%</h2>
		<p class="perf-box-subtext">
			{{ $high_score->high_score }} out of {{ $high_score->total_questions }}
		</p>
		<hr>
		<h5>Poorest performance in {{ $subject->subject_name }} </h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s poorest performance in an exercise in {{ $subject->subject_name}}.</p>
			<h2 class="perf-box-title">{{ round(($low_score->low_score/$low_score->total_questions)*100, 2) }}%</h2>
		<p class="perf-box-subtext">
			{{ $low_score->low_score }} out of {{ $low_score->total_questions }}
		</p>
	</div>
</div>


	{{-- <div class="col-md-4">
		<h5 class="report-block-title">Best performance in {{ $subject->subject_name}}</h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s best performance in an exercise in {{ $subject->subject_name}}.</p>
		<div class="performance-box">
			<h5 class="perf-box-heading">Highest score in {{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h2 class="perf-box-title">  {{ $high_score->high_score }}  out of  {{ $high_score->total_questions }}  ( {{ $high_score_percentage }}% ) </h2>
				<p class="perf-box-subtext"> Exercise:  {{$high_exercise->exercise_name}}  </p>
			</div>
		</div>
	</div> --}}
	
<hr>


<div>
	<h5 class="report-block-title">Exercise performance</h5>
	<p class="report-block-subtitle">These are overall statistics on {{ $user->first_name }}'s exercise performance.</p>

	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>
					Exercise
					<p class="table-subtext">This is the title of the exercise.</p>
				</th>
				<th>
					Percentage Performance
					<p class="table-subtext">This is calculated from all the exercises that {{ $user->first_name }} has performed.</p>
				</th>
				<th>
					Frequency of Exercise
					<p class="table-subtext">This is the number of times {{ $user->first_name }} has performed the exercise.</p>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exercise_scores as $score)
			<tr>
				<?php $exercise = Exercise::find($score->exercise_id) ?>
				<td><b> {{ $exercise->exercise_name }} </b></td>
				<td> {{ $score->percentage }}% </td>
				<td> {{ $score->count }} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
</div>

<script>
(function(){
	var ctx = document.getElementById('report-graph').getContext('2d');
	var chart = {
		labels: {{ json_encode($dates) }},
		datasets: [{
			data: {{ json_encode($questions) }},
			fillColor: "#F8F8F8",
			strokeColor: "#ddd",
			pointColor: "#ff530d",
			pointStrokeColor: "#fff",
		},
		{
			data: {{ json_encode($scores_all) }},
			fillColor: "#88dae6",
			strokeColor: "#72b2bb",
			pointColor: "#ff530d",
			pointStrokeColor: "#fff",
		}]
	};
	new Chart(ctx).Bar(chart);
})();
</script>
@stop