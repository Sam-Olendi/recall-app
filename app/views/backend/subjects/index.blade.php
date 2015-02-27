@extends('layouts.backend')

@section('heading')
My Subjects
@stop

@section('content')
<a href="/subjects/create" class="btn btn-go btn-top right">
	+ Add New Subject
</a>

<div>
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>Subject Name</th>
				<th>Description</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($subjects as $subject)
			<tr>
				<th> {{ $subject->id }} </th>
				<th> <img src="{{ $subject->subject_icon }}"> </th>
				<th> {{ $subject->subject_name }} </th>
				<th class="table-description"> {{ $subject->subject_description }} </th>
				<th class="table-tools">
					<a href="/subjects/{{$subject->id}}/edit" class="btn btn-hover-tools btn-default left"> Edit</a>
					{{ Form::open(['route' => ['subjects.destroy', $subject->id], 'method' => 'delete']) }}
					{{ Form::submit('Delete', ['class' => 'btn btn-hover-tools btn-no']) }}
					{{ Form::close() }}
				</th>
			</tr>
			@endforeach
		</tbody>
		
	</table>
</div>

@stop