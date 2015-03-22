@extends('layouts.backend')

@section('heading')
My Exercises
@stop

@section('content')

<div class="right btn-top">
	<p>Search for exercise</p>
	{{ Form::open(['method' => 'get']) }}
		<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go btn-hover-tools']) }}
		</div>
	{{ Form::close() }}
</div>

<a href="/teacher/mysubjects" class="btn btn-go">
	+ Add New Exercise
</a>
	<hr>

	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>{{ sort_by('exercise_name', 'Exercise' }}</th>
				<th>Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($exercises as $exercise)
			<tr>
				<th> {{ $exercise->id }} </th>
				<th> <img src="{{ $exercise->exercise_icon }}"> </th>
				<th> <a href="/subjects/{{$exercise->subject->id}}/exercises/{{ $exercise->id }}"> {{ $exercise->exercise_name }} </a></th>
				<th class="table-description"> {{ $exercise->exercise_description }} </th>
				<th class="table-tools">
					<a href="/subjects/{{$exercise->subject->id}}/exercises/{{$exercise->id}}/edit" class="btn btn-hover-tools btn-default left"> Edit</a>
					{{ Form::open(['route' => ['subjects.exercises.destroy', $exercise->subject->id, $exercise->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
					{{ Form::close() }}
				</th>
			</tr>
			@endforeach
		</tbody>
		
	</table>

	{{ $exercises->links() }}

@stop