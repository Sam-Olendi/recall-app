@extends('layouts.backend')

@section('heading')
Students
@stop

@section('content')

<p>Search for a student</p>
<a href="/teacher/mystudents/create" class="btn btn-go right">
	+ Add New Student
</a>
{{ Form::open(['method' => 'get']) }}
	<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go btn-hover-tools']) }}
	</div>
{{ Form::close() }}


<hr>

<table class="table table-striped table-hover table-row-link">
	<thead>
		<tr>
			<th>#</th>
			<th></th>
			<th>Student</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<th> {{ $user->id }} </th>
				<th>  </th>
				<th> {{ $user->user->first_name}} {{$user->user->last_name }} </th>
				<th>
					<a href="/teacher/mystudents/{{$user->user->id}}/edit" class="btn btn-default btn-hover-tools left">Edit learner's account</a>
					{{ Form::open(['url' => '/learners/'.$user->user->id, 'method' => 'delete']) }}
						{{ Form::submit('Remove student', ['class' => 'btn btn-no btn-hover-tools']) }}
					{{ Form::close() }}
				</th>
			</tr>
		@endforeach
	</tbody>
	
</table>
@stop