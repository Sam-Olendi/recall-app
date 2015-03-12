@extends('layouts.login')

@section('heading')
	Recall Teacher
@stop

@section('purpose')
	Log in
@stop

@section('form')
	{{ Form::open(['route' => 'teachersession.store']) }}
		<div class="form-group">
			{{ Form::label('email', 'Email:') }} <br>
			{{ Form::email('email', '' ,['placeholder' => 'Email']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password:') }} <br>
			{{ Form::password('password', '' ,['placeholder' => 'Email']) }}
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-go"><i class="fa fa-key"></i>Log in</button>	
		</div>
	{{ Form::close() }}

	<p>If you have no account, please register here:</p>
	<a href="/teacher/register" class="btn btn-default btn-sm">Register</a>
@stop