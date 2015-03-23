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

	<h4>Subject performance comparisons</h4>
	@foreach($best_subject as $key => $best_subject)
		<div class="">
			<?php $subject = Subject::find($key) ?>
			<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h4 class="perf-box-title">{{ $best_subject }}%</h4>
			</div>
		</div>
	@endforeach

	@foreach($worst_subject as $key => $worst_subject)
		<div class="">
		<?php $subject = Subject::find($key) ?>
		<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h4 class="perf-box-title">{{ $worst_subject }}%</h4>
			</div>
		</div>
	@endforeach


	<hr>

	<h4>Percentage performance per subject</h4>

	@foreach($subject_scores as $key => $score)
		<div class="performance-box performance-box-loop">
			<?php $subject = Subject::find($score->subject_id) ?>
			<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h4 class="perf-box-title">{{ round(($score->scores/$score->totals)*100, 2) }}%</h4>
			</div>
		</div>
	@endforeach

	
@stop