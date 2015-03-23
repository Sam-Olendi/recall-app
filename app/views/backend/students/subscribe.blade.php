@extends('layouts.backend')

@section('heading')
	Follow Learner
@stop

@section('content')

	<p>Search for a learner</p>

	{{ Form::open(['method' => 'get']) }}
	<div class="form-group" >
		{{ Form::input('search', 'q', null, ['class' => 'form-input', 'placeholder' => 'Search']) }}
		{{ Form::submit('Search', ['class' => 'btn btn-go']) }}
	</div>
	{{ Form::close() }}

	@if($users)
	<table class="table table-striped table-hover table-row-link">
		<thead>
			<tr>
				<th>Learner</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<th>{{ $user->first_name }} {{ $user->last_name }}</th>
				<th>
					<a href="/teacher/learner/subscribe/{{$user->id}}" class="btn btn-hover-tools btn-default">Subscribe</a>
				</th>
			</tr>
			@endforeach
		</tbody>
		
	</table>
	@endif
	
</table>

@stop