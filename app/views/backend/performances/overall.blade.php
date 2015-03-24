@extends('layouts.backend')

@section('heading')
	<a href="/teacher/dashboard"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Learner Performance Reports
@stop

@section('content')

{{-- <div class="right btn-top">
	<p>Search for a learner</p>

	{{ Form::open(['method' => 'get']) }}
	<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go']) }}
	</div>
	{{ Form::close() }}
</div>

<a href="/teacher/learner/subscribe" class="btn btn-go">
	+ Follow learner
</a>

<hr>

@if($users != null)
<div class="search-results" style="background-color: #f4f4f4; border-radius: 5px; padding: 30px 20px;">
	<i>Search results:</i> <br>
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>#</th>
				<th>Student Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<th></th>
				<th> <a href="/teacher/dashboard/{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }} </a> </th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif --}}

<h4>Overall Student Performance</h4>
	<div>
		<div>
			<h5 class="perf-box-heading">Best performing learner</h5>
			<div class="perf-box-scores">
				@foreach($best_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					{{ $user->first_name }} {{ $user->last_name }} 
					{{ $percentage }}
				@endforeach
			</div>
		</div>

		<div>
			<h5 class="perf-box-heading">Least performing learner</h5>
			<div class="perf-box-scores">
				@foreach($worst_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					{{ $user->first_name }} {{ $user->last_name }} 
					{{ $percentage }}
				@endforeach
			</div>		
		</div>
	</div>
	<div>
		<h5>Top 5 Learners</h5>
		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>Learner</th>
					<th>Overall percentage</th>
				</tr>
			</thead>
			<tbody>
				@foreach($top_five_students as $learner_id => $percentage)
					<tr>
						<?php $user = User::find($learner_id); ?>
						<th> {{ $user->first_name }} {{ $user->last_name }} </th>
						<th> {{ $percentage }} </th>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div>
		<h5 class="perf-box-heading">Best performing exercise</h5>
		<div class="perf-box-scores">
			@foreach($best_exercise as $exercise_id => $percentage)
			<?php $exercise = Exercise::find($exercise_id) ?>
				{{ $exercise->exercise_name }} 
				{{ $percentage }}
			@endforeach
		</div>	
	</div>
	<div>
		<h5 class="perf-box-heading">Least performing exercise</h5>
		<div class="perf-box-scores">
			@foreach($worst_exercise as $exercise_id => $percentage)
			<?php $exercise = Exercise::find($exercise_id) ?>
				{{ $exercise->exercise_name }} 
				{{ $percentage }}
			@endforeach
		</div>	
	</div>

<hr>

<h4>Subject performance comparisons</h4>
	@foreach($best_score as $key => $best_score)
		<div class="">
			<?php $subject = Subject::find($key) ?>
			<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h4 class="perf-box-title">{{ $best_score }}%</h4>
			</div>
		</div>
	@endforeach

	@foreach($worst_score as $key => $worst_score)
		<div class="">
		<?php $subject = Subject::find($key) ?>
		<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
			<div class="perf-box-scores">
				<h4 class="perf-box-title">{{ $worst_score }}%</h4>
			</div>
		</div>
	@endforeach

<hr>
	
<h4>Performance per Subject</h4>

@foreach($performance as $performance)
	<div class="">
		<?php $subject = Subject::find($performance->subject_id) ?>
		<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
		<div class="perf-box-scores">
			{{ round(($performance->scores/$performance->totals)*100, 2) }}%
		</div>
	</div>
@endforeach

</div>

{{-- <table class="table table-striped table-hover table-row-link">
	<thead>
		<tr>
			<th>#</th>
			<th>Student</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($learners as $learner)
		<tr>
			<th> {{ $learner->id }} </th>
			<th><a href="/teacher/dashboard/{{ $learner->user->id }}">{{ $learner->user->first_name }} {{ $learner->user->last_name }}</a></th>
			<th><a href="/teacher/dashboard/{{ $learner->user->id }}" class="btn btn-default btn-hover-tools">View report</a></th>
		</tr>
		@endforeach
	</tbody>
	
</table> --}}
@stop