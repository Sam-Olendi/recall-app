@extends('layouts.backend')

@section('heading')
	<a href="/teacher/dashboard"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Overall Performance Reports
@stop

@section('content')
<a href="/teacher/performance/overall/export" class="btn btn-go btn-top right" target="_blank">
	Export to PDF
</a>


@if($learners != null)

<h4>Overall Student Performance</h4>
<div class="row">
	<div class="col-md-6">
	<h5 class="report-block-title">Learner Performance</h5>
	<p class="report-block-subtitle">These are your best and least performing learners</p>
		<div class="performance-box-alt left">
			<h5 class="perf-box-heading">Top learner</h5>
			<div class="perf-box-scores perf-box-scores-alt">
				@foreach($best_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					<h4 class="perf-box-name">{{ $user->first_name }} {{ $user->last_name }} </h4>
					<h2 class="perf-box-score">{{ $percentage }}%</h2>
				@endforeach
			</div>
		</div>

		<div class="performance-box-alt left">
			<h5 class="perf-box-heading">Least performing learner</h5>
			<div class="perf-box-scores perf-box-scores-alt">
				@foreach($worst_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					<h4 class="perf-box-name">{{ $user->first_name }} {{ $user->last_name }} </h4>
					<h2 class="perf-box-score">{{ $percentage }}%</h2>
				@endforeach
			</div>		
		</div>
	</div>
	<div class="col-md-6">
		<h5 class="report-block-title">Your Top 3 Learners</h5>
		<p class="report-block-subtitle">This is a ranking of your learners. You can view more details by clicking the button at the bottom of the table.</p>
		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>Learner</th>
					<th>Overall percentage</th>
				</tr>
			</thead>
			<tbody>
				@foreach($top_three_students as $learner_id => $percentage)
					<tr>
						<?php $user = User::find($learner_id); ?>
						<th> <b> {{ $user->first_name }} {{ $user->last_name }} </b> </th>
						<th> {{ $percentage }} </th>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{-- <a href="#" class="btn btn-go right btn-hover-tools">View learner rankings</a> --}}
	</div>
</div>
{{-- End of row --}}

<hr>

<h4>Performance per subject</h4>
<p class="report-block-subtitle">This list shows the performance per subject of your learners</p>

<div class="js-masonry" data-masonry-options='{ "columnWidth": 30, "itemSelector": ".perf-box-item" }'>
@foreach($subject_performance as $performance)
	<div class="perf-box-item">
		<?php $subject = Subject::find($performance->subject_id) ?>
		<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
		<div class="perf-box-scores">
			<h4 class="perf-box-score">{{ round(($performance->scores/$performance->totals)*100, 2) }}%</h4>
			<p class="perf-box-subtext">Practice frequency: {{ $performance->count }} times</p>
		</div>
	</div>
@endforeach
</div>

<hr>

<h4>Subject performance comparisons</h4>
<div class="row">
	<div class="col-md-6">
		<h5 class="report-block-title">Best and least performing subjects</h5>
		<p class="report-block-subtitle">The following subjects have the best and worst overall performances respectively. The figures below are the total percentages scored by your learners collectively in all their exercises.</p>
		@foreach($best_score as $key => $best_score)
			<div class="performance-box-alt left">
				<?php $subject = Subject::find($key) ?>
				<h5 class="perf-box-heading">Best performing subject</h5>
				<div class="perf-box-scores">
					<h4 class="perf-box-name">{{ $subject->subject_name }}</h4>
					<h4 class="perf-box-score">{{ $best_score }}%</h4>
				</div>
			</div>
		@endforeach

		@foreach($worst_score as $key => $worst_score)
			<div class="performance-box-alt left">
			<?php $subject = Subject::find($key) ?>
			<h5 class="perf-box-heading">Worst performing subject</h5>
				<div class="perf-box-scores">
					<h4 class="perf-box-name">{{ $subject->subject_name }}</h4>
					<h4 class="perf-box-score">{{ $worst_score }}%</h4>
				</div>
			</div>
		@endforeach
	</div>

	<div class="col-md-6">
		<h5 class="report-block-title">Best and least performing exercises</h5>
		<p class="report-block-subtitle">Below are the exercises with the overall best and worst learner performances. The figures shown are the total percentages scored by your learners collectively in both the exercises.</p>
		<div class="performance-box-alt left">
			<h5 class="perf-box-heading">Best performing exercise</h5>
			<div class="perf-box-scores">
				@foreach($best_exercise as $exercise_id => $percentage)
				<?php $exercise = Exercise::find($exercise_id) ?>
					<h4 class="perf-box-name">{{ $exercise->exercise_name }} </h4>
					<h4 class="perf-box-score">{{ $percentage }}%</h4>
				@endforeach
			</div>	
		</div>
		<div class="performance-box-alt left">
			<h5 class="perf-box-heading">Least performing exercise</h5>
			<div class="perf-box-scores">
				@foreach($worst_exercise as $exercise_id => $percentage)
				<?php $exercise = Exercise::find($exercise_id) ?>
					<h4 class="perf-box-name">{{ $exercise->exercise_name }}</h4>
					<h4 class="perf-box-score">{{ $percentage }}%</h4>
				@endforeach
			</div>	
		</div>
	</div>
	
</div>
{{-- Enf of row --}}


<hr>

<h4>Learner Rankings</h4>
<p class="report-block-subtitle">This list shows the overall ranking of your performers</p>

<div>
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>Learner</th>
				<th>Overall percentage</th>
				<th>Frequency of practice</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($overall_scores as $scores)
				<tr>
					<?php $user = User::find($scores->user_id) ?>
					<th><b> {{ $user->first_name }} {{ $user->last_name }} </b></th>
					<th> {{ $scores->percentage }} </th>
					<th> {{ $scores->count }} times </th>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>


@endif


@if( $learners == null )

<p>You have no learners at the moment. Please follow some learners to view their performances</p>

@endif

@stop