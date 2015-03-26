@extends('layouts.backend')

@section('heading')
	<a href="/teacher/dashboard"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Learner Performance Reports
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
	+ Follow new learner
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
				<th> <a href="/teacher/performance/{{ $user->id }}"> {{ $user->first_name }} {{ $user->last_name }} </a> </th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endif

<div>
	<p class="alert alert-warning alert-dismissible alert-text" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Note:</strong> If one of your learners does not appear here, it is because they have done very few exercises, hence there is very little data to organize and report.</p>
</div>

<br>

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
			<th><a href="/teacher/performance/{{ $learner->user->id }}">{{ $learner->user->first_name }} {{ $learner->user->last_name }}</a></th>
			<th><a href="/teacher/performance/{{ $learner->user->id }}" class="btn btn-default btn-hover-tools">View report</a></th>
		</tr>
		@endforeach
	</tbody>
	
</table>
@stop