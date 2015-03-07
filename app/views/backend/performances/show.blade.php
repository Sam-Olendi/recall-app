@extends('layouts.backend')

@section('heading')
Student Performance: {{ $user->first_name }} {{ $user->last_name }}
@stop

@section('content')

	<div class="row">
		<div class="col-md-8">
			
		</div>
		<div class="col-md-4">
			<table class="table table-striped table-hover table-row-link">
				<thead>
					<tr>
						<th>Exercise</th>
						<th>Score</th>
					</tr>
				</thead>
				<tbody>
					@foreach($scores as $score)
						<tr>
							<th> {{ $score->exercise->exercise_name }} </th>
							<th> {{ $score->user_score }} </th>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<div class="performance-box">
				<h4 class="perf-box-heading">Best performing subject</h4>
				<div class="perf-box-scores">
					<h5> Subject Name </h5>
					<p> Highest score: </p>
					<p> Most recent score: </p>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-1">
			another yes
		</div>
		<div class="col-md-3 col-md-offset-1">
			and yet another
		</div>
	</div>

@stop