@extends('layouts.backend')

@section('heading')
My Learners
@stop

@section('content')

<div class="right btn-top">
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
@endif

<div>

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
	<div class="performance-box performance-box-loop">
		<?php $subject = Subject::find($performance->subject_id) ?>
		<h5 class="perf-box-heading">{{ $subject->subject_name }}</h5>
		<div class="perf-box-scores">
			{{ round(($performance->scores/$performance->totals)*100, 2) }}%
		</div>
	</div>
@endforeach

</div>

<table class="table table-striped table-hover table-row-link">
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
	
</table>
@stop