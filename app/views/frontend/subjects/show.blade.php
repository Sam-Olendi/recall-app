@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> {{ $subject->subject_name }} </h3>
	<p> {{ $subject->subject_description }} </p>
	<div class="subjects">
		@foreach($exercises as $exercise)
			<div class="subject-back left">
				<div>
					@if( $exercise->exercise_icon != null )
					<img src="/{{ $exercise->exercise_icon }}" width="70px" class="subject-icon">
					@else
					<img src="/assets/img/default.jpg" class="subject-icon">
					@endif
				</div>
				<h4><a href="{{$subject->id}}/exercises/{{$exercise->id}}"> {{ $exercise->exercise_name }} </a></h4>
				<p class="subject-description"> {{ $exercise->exercise_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop