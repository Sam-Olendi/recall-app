@extends('layouts.frontend')
@section('content')
<div class="main-wrapper">
	<div class="quiz-wrapper">
		<div class="quiz-title">
			<h3 class="exercise-heading"> {{ $exercise->exercise_name }} </h3>
			<p class="exercise-subtitle"> {{ $exercise->exercise_description }} </p>
		</div>
		
		<div class="quiz-box quiz-score">
			@if ( $score > 2 )
			<h4>Congratulations!</h4>
			<img src="/assets/img/target.png" height="200px">
			@endif
			@if ( $score == 2 )
			<h4>Great job!</h4>
			<img src="/assets/img/thumbs-up.png" height="200px">
			@endif
			@if ( $score < 2 )
			<h4>Nice try, buddy. Keep working.</h4>
			<img src="/assets/img/pencil.png" height="200px">
			@endif
			<p>You have scored {{ $score }} out of {{ $question_number }}</p>
			<a href="/learner/classroom" class="btn btn-go">Back to Classroom</a>
		</div>

		<div>
		</div>
		
	</div>
</div>
@stop