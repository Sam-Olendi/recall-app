@extends('layouts.backend')

@section('heading')
	<a href="/teacher/performance/learners/"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Student Performance: {{ $user->first_name }} {{ $user->last_name }}
@stop

@section('content')
	<div>
		<h4 class="report-block-title">Please select a subject to view:</h4>
		<p class="report-block-subtitle">Below is a list of your subjects. <br> Please select one subject to view a report for {{ $user->first_name}}'s performance in the subject:</p>
		{{ Form::open(['url' => '/teacher/dashboard/'.$user->id.'/report/']) }}
			{{ Form::select('subject_id', $subjects) }}
			{{ Form::submit('View report', ['class' => 'btn btn-go']) }}
		{{ Form::close() }}
	</div>

	<hr>

	<h4>Percentage performance per subject</h4>
	<p class="report-block-subtitle">Below is a list of {{ $user->first_name}}'s performance in each subject.</p>
	<div class="js-masonry" data-masonry-options='{ "columnWidth": 30, "itemSelector": ".perf-box-item" }'>
		@foreach($subject_scores as $key => $score)
			<div class="perf-box-item">
				<?php $subject = Subject::find($score->subject_id) ?>
				<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
				<div class="perf-box-scores">
					<h4 class="perf-box-score">{{ round(($score->scores/$score->totals)*100, 2) }}%</h4>
				</div>
			</div>
		@endforeach
	</div>

	<hr>

	<h4>Subject performance comparisons</h4>
	<p class="report-block-subtitle">These are {{ $user->first_name}}'s best and least performing subjects</p>
	<div class="js-masonry" data-masonry-options='{ "columnWidth": 30, "itemSelector": ".perf-box-item" }'>
		@foreach($best_subject as $key => $best_subject)
			<div class="perf-box-item">
				<?php $subject = Subject::find($key) ?>
				<h5 class="perf-box-heading">Best Performance</h5>
				<div class="perf-box-scores">
					<h4 class="perf-box-name">{{ $subject->subject_name }}</h4>
					<h4 class="perf-box-score">{{ $best_subject }}%</h4>
				</div>
			</div>
		@endforeach

		@foreach($worst_subject as $key => $worst_subject)
			<div class="perf-box-item">
			<?php $subject = Subject::find($key) ?>
			<h5 class="perf-box-heading">Worst Performance</h5>
				<div class="perf-box-scores">
					<h4 class="perf-box-name">{{ $subject->subject_name }}</h4>
					<h4 class="perf-box-score">{{ $worst_subject }}%</h4>
				</div>
			</div>
		@endforeach
	</div>
	
@stop