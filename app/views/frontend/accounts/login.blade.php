@extends('layouts.login')

@section('heading')
	Recall Learner

@stop

@section('purpose')
	Log in
@stop

@section('form')
	{{ Form::open(['route' => 'learnersession.store']) }}
		<div class="form-group">
			{{ Form::label('email', 'Email:') }} <br>
			{{ Form::email('email', '' ,['placeholder' => 'Email']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password:') }} <br>
			{{ Form::password('password', '' ,['placeholder' => 'Email']) }}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-go">Log in</button>	
		</div>
	{{ Form::close() }}

	<p>If you have no account, please register here:</p>
	<a href="/learner/register" class="btn btn-default btn-sm">Register</a>
@stop