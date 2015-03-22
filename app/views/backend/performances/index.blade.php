@extends('layouts.backend')

@section('heading')
Student Performance
@stop

@section('content')

<p>Search for a student</p>
{{ Form::open(['method' => 'get']) }}
	<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go']) }}
	</div>
{{ Form::close() }}

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


<hr>

<table class="table table-striped table-hover table-row-link">
	<thead>
		<tr>
			<th>#</th>
			<th></th>
			<th>Student</th>
		</tr>
	</thead>
	<tbody>
		@foreach($scores as $score)
			<tr>
				<th> {{ $score->id }} </th>
				<th>  </th>
				<th> <a href="/teacher/dashboard/{{ $score->user->id }}"> {{ $score->user->first_name}} {{$score->user->last_name }} </a> </th>
			</tr>
		@endforeach
	</tbody>
	
</table>
@stop