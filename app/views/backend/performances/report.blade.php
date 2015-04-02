@extends('layouts.backend')

@section('heading')
{{ $user->first_name }} {{ $user->last_name }}'s Performance: {{ $subject->subject_name }}
@stop

@section('content')

<a href="/teacher/performance/{{$user->id}}/report/{{$subject->id}}/export" class="btn btn-go btn-top right" target="_blank">
	Export to PDF
</a>

@if( $scores_all != null )
<div>
	<h5 class="report-block-title">Score Graph</h5>
	<p class="report-block-subtitle">These are {{ $user->first_name }}'s scores in recently performed exercises.</p>
	<canvas id="report-graph" width="1000" height="300">
	</canvas>
</div>

<hr>

<div class="row">
	<div class="col-md-4">
		<h5 class="report-block-title">Overall performance in {{ $subject->subject_name}}</h5>
		<p class="report-block-subtitle">This is calculated from all the exercises that {{ $user->first_name }} has performed.</p>
		<div class="performance-box">
			<h5 class="perf-box-heading">Percentage performance in {{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				@if($percentage != null)
					<h2 class="perf-box-title"> {{ $percentage }}% </h2>
				@else
					<h2 class="perf-box-title"> N/A </h2>
				@endif
				@foreach($subject_count as $count)
					<p class="perf-box-subtext"> Number of times practiced: {{ $count->count }} </p>
				@endforeach
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<h5 class="report-block-title">Most recent exercise performance</h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s last score in the exercise that they last performed.</p>
		<div class="performance-box">
			<h5 class="perf-box-heading">Most recent score in {{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				@if($recent_score != null)
					<h2 class="perf-box-title">  {{ $recent_score->user_score }}  out of  {{ $recent_score->total_questions}} ( {{ round(($recent_score->user_score / $recent_score->total_questions)*100, 2) }}%) </h2>
					@if( $low_exercise != null )
					<p class="perf-box-subtext"> Exercise: {{ $low_exercise->exercise_name }} </p>
					@endif
				@else
					<h2 class="perf-box-title"> N/A </h2>
				@endif

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<h5>Best performance in {{ $subject->subject_name }} </h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s best performance in an exercise in {{ $subject->subject_name}}.</p>
		@if( $high_score != null )
			<h2 class="perf-box-title">{{ round(($high_score->high_score/$high_score->total_questions)*100, 2) }}%</h2>
			<p class="perf-box-subtext">
				{{ $high_score->high_score }} out of {{ $high_score->total_questions }}
			</p>
		@else
			<h2 class="perf-box-title">N/A</h2>
		@endif

		<hr>

		<h5>Poorest performance in {{ $subject->subject_name }} </h5>
		<p class="report-block-subtitle">This is {{ $user->first_name }}'s poorest performance in an exercise in {{ $subject->subject_name}}.</p>
		@if( $low_score != null )
			<h2 class="perf-box-title">{{ round(($low_score->low_score/$low_score->total_questions)*100, 2) }}%</h2>
			<p class="perf-box-subtext">
				{{ $low_score->low_score }} out of {{ $low_score->total_questions }}
			</p>
		@else
			<h2 class="perf-box-title">N/A</h2>
		@endif
		
	</div>
</div>


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

<hr>

<div>
	<h5 class="report-block-title">General performance</h5>
	<p class="report-block-subtitle">This is {{ $user->first_name }}'s general exercise performance in {{ $subject->subject_name }}.</p>

	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>
					Exercise
				</th>
				<th>
					Score
				</th>
				<th>
					Out Of
				</th>
				<th>
					Percentage Performance
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subjects as $subject)
				<tr>
					<?php $exercise = Exercise::find($subject->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $subject->user_score }} </td>
					<td> {{ $subject->total_questions }} </td>
					<td> {{ round(($subject->user_score/$subject->total_questions)*100, 2) }}% </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@else

<h4>{{ $user->first_name }} has not yet performed any exercises in {{ $subject->subject_name }}</h4>

@endif




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