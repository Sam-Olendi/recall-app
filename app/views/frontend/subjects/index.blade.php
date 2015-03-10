@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3>What subject would you like to study?</h3>
	<div class="subjects">
		@foreach($subjects as $subject)
			<div class="subject-back left">
				<div>
					@if( $subject->subject_icon != null )
					<a href="classroom/subjects/{{$subject->id}}"><img src="/{{ $subject->subject_icon }}" width="70px" class="subject-icon"></a>
					@else
					{{-- <div class="subject-icon"></div> --}}
					<a href="classroom/subjects/{{$subject->id}}"><img src="/assets/img/default-2.jpg" class="subject-icon"></a>
					@endif
				</div>
				<h4><a href="classroom/subjects/{{$subject->id}}"> {{ $subject->subject_name }} </a></h4>
				<p class="subject-description"> {{ $subject->subject_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop