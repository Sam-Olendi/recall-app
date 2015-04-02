@extends('layouts.frontend')
@section('content')

<div class="hero">
	<div class="container">
		
		<h1>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </h1>
		<p> Learner </p>
		<p> {{ Auth::user()->email }} </p>

	</div>
</div>

<div class="">
	<div class="container">

		<h3>Recent score</h3>
		@foreach($recent_score as $score)
			<div class="profile-score-box">
				<div class="col-md-4 psb-icon">
					<img src="/assets/img/target.png" width="90px">
				</div>
				<div class="col-md-8 psb-score">
					<h4 class="psb-score-subject"> {{ Exercise::find($score->exercise_id)->exercise_name }} </h4>
					<h2 class="psb-score-percentage">
						{{ $score->user_score }} out {{ $score->total_questions }}
						({{ round(($score->user_score/$score->total_questions)*100, 2) }}%)
					</h2>
				</div>
			</div>
		@endforeach

		<hr>

		<h3>My scores in each subject</h3>
		<div  class="js-masonry" data-masonry-options='{ "columnWidth": 30, "itemSelector": ".profile-score-box" }'>
			@foreach($score_per_subject as $score)
				
			<div class="profile-score-box row">
				<div class="col-md-4 psb-icon">
					<img src="/assets/img/target.png" width="90px">
				</div>
				<div class="col-md-8 psb-score">
					<h4 class="psb-score-subject"> {{ Subject::find($score->subject_id)->subject_name }} </h4>
					<h2 class="psb-score-percentage"> {{ $score->percentage }}% </h2>
					<p class="perf-box-subtext"> Number of exercises done: {{ $score->count }} </p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@stop