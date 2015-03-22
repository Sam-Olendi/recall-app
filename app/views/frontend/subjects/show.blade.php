@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
	
	<h3><a href="/learner/classroom"> <i class="fa fa-arrow-left" ></i> </a> {{ $subject->subject_name }} <br> <small>{{ $subject->subject_description }}</small> </h3>
	<div class="subjects">
		@foreach($exercises as $exercise)
			<div class="subject-back left">
				<div>
					<a href="{{$subject->id}}/exercises/{{$exercise->id}}"><img src="/assets/img/exercise-icon.png" class="subject-icon"></a>
				</div>
				<h4><a href="{{$subject->id}}/exercises/{{$exercise->id}}"> {{ $exercise->exercise_name }} </a></h4>
				<p class="subject-description"> {{ $exercise->exercise_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop