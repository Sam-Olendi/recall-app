@extends('layouts.login')

@section('heading')
	Recall Teacher
@stop

@section('purpose')
	Create a New Account
@stop

@section('form')
	{{ Form::open(['route' => 'teachers.store']) }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name:') }} <br> 
			{{ Form::text('first_name', '' , ['placeholder' => 'First Name', 'class' => 'form-input']) }}<br>
			{{ $errors->first('first_name', '<span class="error">:message</span>') }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:') }} <br>
			{{ Form::text('last_name', '' , ['placeholder' => 'Last Name', 'class' => 'form-input']) }}<br>
			{{ $errors->first('last_name', '<span class="error">:message</span>') }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email address:') }} <br>
			{{ Form::email('email', '' , ['placeholder' => 'Email address', 'class' => 'form-input']) }}<br>
			{{ $errors->first('email', '<span class="error">:message</span>') }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password:') }} <br>
			{{ Form::password('password', '' , ['placeholder' => 'Password', 'class' => 'form-input']) }}<br>
			{{ $errors->first('password', '<span class="error">The password must be between 6 - 10 characters, with at least one number</span>') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Create account', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
@stop