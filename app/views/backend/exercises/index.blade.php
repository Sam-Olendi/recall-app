@extends('layouts.backend')

@section('heading')
	My Exercises
@stop

@section('content')

	<a href="/subjects/" class="btn btn-go btn-top right">
        + Add New Exercise
    </a>
	
	<div>
		<table class="table table-striped table-hover table-row-link">
			<thead>
				<tr>
					<th>#</th>
					<th>Exercise Name</th>
					<th>Subject</th>
					<th>Description</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($exercises as $exercise)
				<tr>
					<th> {{ $exercise->id }} </th>
					<th><a href="/exercises/{{$exercise->id}}/questions"> {{ $exercise->exercise_name }} </a></th>
					<th> {{ $exercise->subject->subject_name }} </th>
					<th class="table-description"> {{ $exercise->exercise_description }} </th>
					<th class="table-tools">
						<a href="/subjects/{{$exercise->subject->id}}/exercises/{{$exercise->id}}/edit" class="btn btn-hover-tools btn-default left"> Edit</a>
						{{ Form::open() }}
			    			{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
			    		{{ Form::close() }}
					</th>
				</tr>
				@endforeach
			</tbody>
		
		</table>
	</div>

@stop