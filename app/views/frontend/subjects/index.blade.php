@extends('layouts.frontend')

@section('content')

<div class="container wrapper">
		
	<h3>What subject would you like to study?</h3>
	<div class="subjects">
		@foreach($subjects as $subject)
			<div class="subject-back left">
				<div>
					@if( $subject->subject_icon != null )
					<img src="/{{ $subject->subject_icon }}" width="70px" class="subject-icon">
					@else
					{{-- <div class="subject-icon"></div> --}}
					<img src="/assets/img/default.jpg" class="subject-icon">
					@endif
				</div>
				<h4><a href="classroom/subjects/{{$subject->id}}"> {{ $subject->subject_name }} </a></h4>
				<p class="subject-description"> {{ $subject->subject_description }} </p>
			</div>
		@endforeach
	</div>

</div>

@stop