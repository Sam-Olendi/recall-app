@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> {{ $subject->subject_name }} </h3>
	<p> {{ $subject->subject_description }} </p>
	
	@foreach($questions as $question)
		{{ $question->question_text }}
	@endforeach

</div>

@stop