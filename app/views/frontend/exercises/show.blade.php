@extends('layouts.frontend')
@section('content')
<div class="main-wrapper">
	<div class="quiz-wrapper">
		<div class="quiz-title">
			<h3 class="exercise-heading"> {{ $exercise->exercise_name }} </h3>
			<p class="exercise-subtitle"> {{ $exercise->exercise_description }} </p>
		</div>
		
			{{ Form::open(['url' => 'subjects/'. $subject->id .'/exercises/' . $exercise->id . '/questions/validate']) }}
			<?php
				$i = 0;
				$z = 0;
			?>
			@foreach($questions as $question)
			<div class="quiz-box row">
				<p class="question-text">{{ $question->question_text }}</p>
				@if ( $question->question_image != null )
				<img src="/{{ $question->question_image }}">
				@endif
				<div class="qb-answer-group" >
					@foreach($question->answers->shuffle() as $answer)
					<div class="form-group qb-answers">
						{{ Form::radio($count[$z], $answer->answer_correct) }}
						{{ Form::label('') }}  {{$answer->answer_text}} <br>
					</div>
					<?php 
						$i = $i+1;
						$checkModulus = $i % 3;
						if ( $checkModulus == 0){

							$z = $z + 1;

						}
					 ?>
					@endforeach
				</div>
				<br>
			</div>
			@endforeach
			{{ Form::submit('Finish exercise', ['class' => 'btn btn-go right']) }}
			{{ Form::close() }}
	</div>
</div>
@stop