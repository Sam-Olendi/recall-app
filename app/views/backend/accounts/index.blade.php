@extends('layouts.backend')

@section('heading')
My Account
@stop

@section('content')

<div>
	{{ Form::open(['url' => 'teachers/'. Auth::user()->id , 'method' => 'put']) }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name:') }}
			{{ Form::text('first_name', $user->first_name , ['class' => 'fom-input']) }}
			{{ $errors->first('first_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name:') }}
			{{ Form::text('last_name', $user->last_name , ['class' => 'form-input']) }}
			{{ $errors->first('last_name', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password', '' , ['class' => 'form-input']) }}
			{{ $errors->first('password', '<span class="error">:message</span> ') }}
		</div>
		<div class="form-group">
			{{ Form::submit('Save changes', ['class' => 'btn btn-go']) }}
		</div>
	{{ Form::close() }}
</div>

<div>
	{{ Form::open(['url' => 'teachers/'.Auth::user()->id, 'method' => 'delete']) }}
		{{ Form::submit('Deactivate account', ['class' => 'btn btn-no']) }}
	{{ Form::close() }}
</div>

@stop