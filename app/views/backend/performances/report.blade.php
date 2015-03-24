@extends('layouts.backend')

@section('heading')
Learner Performance: {{ $subject->subject_name }}
@stop

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h5 class="report-block-title">Score Graph</h5>
			<p class="report-block-subtitle">These are the learner's scores in recently performed exercises.</p>
			<canvas id="report-graph" width="600" height="300">
				
			</canvas>
		</div>
		<div class="col-md-4">
			<h5 class="report-block-title">Recent Exercise Scores</h5>
			<p class="report-block-subtitle">These are the learner's scores in recently performed exercises.</p>
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
		</div>
	</div>

	<hr>


	<div class="row">
		<div class="col-md-4">
			<h5 class="report-block-title">Overall performance in {{ $subject->subject_name}}</h5>
			<p class="report-block-subtitle">This is calculated from all the exercises that the learner has performed.</p>
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
			<h5 class="report-block-title">Best performance in {{ $subject->subject_name}}</h5>
			<p class="report-block-subtitle">This is the learner's best performance in an exercise in {{ $subject->subject_name}}.</p>
			<div class="performance-box">
				<h5 class="perf-box-heading">Highest score in {{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h2 class="perf-box-title">  {{ $high_score->high_score }}  out of  {{ $high_score->total_questions }}  ( {{ $high_score_percentage }}% ) </h2>
					<p class="perf-box-subtext"> Exercise:  {{$high_exercise->exercise_name}}  </p>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<h5 class="report-block-title">Poorest performance in {{ $subject->subject_name}}</h5>
			<p class="report-block-subtitle">This is the learner's poorest performance in an exercise in {{ $subject->subject_name}}.</p>
			<div class="performance-box">
				<h5 class="perf-box-heading">Lowest score in {{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h2 class="perf-box-title">  {{$low_score->low_score}}  out of  {{$low_score->total_questions}}  ( {{ $low_score_percentage }}% )</h2>
					<p class="perf-box-subtext"> Exercise: {{ $low_exercise->exercise_name }} </p>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<div>
		
	<h5 class="report-block-title">General Exercise Performance</h5>
	<p class="report-block-subtitle">This is a list of the overall {{ $subject->subject_name}} exercises performance of the learner.</p>


		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>Exercise</th>
					<th>Learner's Score</th>
					<th>Out Of</th>
					<th>Percentage Score</th>
				</tr>
			</thead>
			<tbody>
				@foreach($scores as $score)
					<tr>
						<th> <b>{{ $score->exercise->exercise_name }}</b> </th>
						<th> {{ $score->user_score }} </th>
						<th> {{ $score->total_questions }} </th>
						<th> <b>{{ round(($score->user_score/$score->total_questions)*100, 2) }}%</b> </th>
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