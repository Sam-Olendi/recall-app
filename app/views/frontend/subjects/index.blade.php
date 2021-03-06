@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3>What subject would you like to study? <br> <small>Choose a subject from the ones below</small> </h3>
	<div class="subjects">
		@foreach($subjects as $subject)
			<div class="subject-back left">
				<div>
					<a href="classroom/subjects/{{$subject->id}}"><img src="/assets/img/subject-icon.png" class="subject-icon"></a>
				</div>
				<h4><a href="classroom/subjects/{{$subject->id}}"> {{ $subject->subject_name }} </a></h4>
				<p class="subject-description"> {{ $subject->subject_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop