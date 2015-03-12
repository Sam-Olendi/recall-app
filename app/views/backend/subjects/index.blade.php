@extends('layouts.backend')

@section('heading')
My Subjects
@stop

@section('content')
<div class="right btn-top">
	<p>Search for subject</p>
	{{ Form::open(['method' => 'get']) }}
		<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go btn-hover-tools']) }}
		</div>
	{{ Form::close() }}
</div>

<a href="/subjects/create" class="btn btn-go ">
	+ Add New Subject
</a>

<hr>

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
				<th> <img src="/assets/img/subject-icon.png" width="30px"> </th>
				<th> <a href="/subjects/{{$subject->id}}"> {{ $subject->subject_name }} </a></th>
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