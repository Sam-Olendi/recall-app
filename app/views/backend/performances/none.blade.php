@extends('layouts.backend')

@section('heading')
	<a href="/teacher/performance/learners/"><span class="glyphicon glyphicon-chevron-left back-icon"></span></a>
	Student Performance: {{ $user->first_name }} {{ $user->last_name }}
@stop

@section('content')

<h4>The learner has not yet performed any exercises.</h4>
	
@stop