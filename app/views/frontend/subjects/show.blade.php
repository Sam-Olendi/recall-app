@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3> {{ $subject->subject_name }} </h3>
	<p> {{ $subject->subject_description }} </p>
	<div class="subjects">
		@foreach($exercises as $exercise)
			<div class="subject-back left">
				<div>
					<img src="" class="subject-icon">
				</div>
				<h4><a href="{{$subject->id}}/exercises/{{$exercise->id}}"> {{ $exercise->exercise_name }} </a></h4>
				<p class="subject-description"> {{ $exercise->exercise_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop