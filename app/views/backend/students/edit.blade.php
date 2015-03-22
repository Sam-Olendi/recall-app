@extends('layouts.backend')

@section('heading')
	<a href="/teacher/mystudents"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Reset student account
@stop

@section('content')
		{{ Form::open(['url' => '/teacher/mystudents/'.$user->id, 'method' => 'put']) }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name:') }} <br>
			{{ Form::text('first_name', $user->first_name, ['placeholder' => 'First name', 'class' => 'form-input']) }} <br>
			{{ $errors->first('first_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:') }} <br>
			{{ Form::text('last_name', $user->last_name, ['placeholder' => 'Last name', 'class' => 'form-input']) }} <br>
			{{ $errors->first('last_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password:') }} <br>
			{{ Form::password('password', '', ['placeholder' => 'Password', 'class' => 'form-input']) }} <br>
			{{ $errors->first('password', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Reset student account', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop