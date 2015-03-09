@extends('layouts.backend')

@section('heading')
	<a href="/teacher/mysubjects"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	{{ $subject->subject_name }}
@stop

@section('content')

<div>

	<a href="/subjects/{{$subject->id}}/exercises/create" class="btn btn-go btn-top right">
		+ Add New Exercise
	</a>

	<p>Search</p>
	{{ Form::open(['method' => 'get']) }}
		<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go btn-hover-tools']) }}
		</div>
	{{ Form::close() }}

	<hr>

	<p>The following exercises are under {{ $subject->subject_name}}</p>
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>Exercise Name</th>
				<th>Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($exercises as $exercise)
			<tr>
				<th> {{ $exercise->id }} </th>
				<th> <img src="{{ $exercise->exercise_icon }}"> </th>
				<th> <a href="/subjects/{{$subject->id}}/exercises/{{$exercise->id}}"> {{ $exercise->exercise_name }} </a></th>
				<th class="table-description"> {{ $exercise->exercise_description }} </th>
				<th class="table-tools">
					<a href="/subjects/{{$subject->id}}/exercises/{{$exercise->id}}/edit" class="btn btn-hover-tools btn-default left"> Edit</a>
					{{ Form::open(['route' => ['subjects.exercises.destroy', $subject->id, $exercise->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
					{{ Form::close() }}
				</th>
			</tr>
			@endforeach
		</tbody>
		
	</table>
</div>

@stop