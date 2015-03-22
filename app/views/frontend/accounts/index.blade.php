@extends('layouts.frontend')
@section('content')

<div class="hero">
	<div class="container">
		
		<h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h1>
		<p> Student </p>
		<p> {{ Auth::user()->email }} </p>

	</div>
</div>

<div class="">
	<div class="container">
		<h3>My scores</h3>

		<div>
			@foreach($percentages as $subject => $percentage)
			<div class="profile-score-box row">
				<div class="col-md-4 psb-icon">
					<img src="/assets/img/target.png" width="90px">
				</div>
				<div class="col-md-8 psb-score">
					<h4 class="psb-score-subject"> {{ $subject }} </h4>
					<h2 class="psb-score-percentage"> {{ $percentage }} </h2>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@stop