@extends('layouts.exports')


@section('title')
	{{ $user->first_name }} {{ $user->last_name }}'s Performance in {{ $subject->subject_name }}
@stop


@section('content')

<section>
	<h3 class="section-title">Overall performance</h3>
	<p class="section-subtitle">This is {{ $user->first_name }}'s overall score in {{ $subject->subject_name }}. It has been calculated by adding their total scores and getting the overall percentage score of the learner.</p>
	@foreach($overall_score as $score)
		<h2>{{ $score->percentage }}%</h2>
	@endforeach
</section>

<section>
	<h3 class="section-title">Overall performance comparison</h3>
	<p class="section-subtitle">This is a comparison between {{ $user->first_name }}'s best and poorest performances.</p>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>Exercise</th>
				<th>Percentage score</th>
				<th>Frequency of practice</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Best performance</td>
				@foreach($best_score as $score)
					<?php $exercise = Exercise::find($score->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $score->percentage }}% </td>
					<td> {{ $score->count }} </td>
				@endforeach
			</tr>
			<tr>
				<td>Poorest performance</td>
				@foreach($worst_score as $score)
					<?php $exercise = Exercise::find($score->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $score->percentage }}% </td>
					<td> {{ $score->count }} </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Exercise performance</h3>
	<p class="section-subtitle">This is {{ $user->first_name }}'s performance per exercise.</p>
	<table>
		<thead>
			<tr>
				<th>Exercise</th>
				<th>Percentage score</th>
				<th>Frequency of practice</th>
			</tr>
		</thead>
		<tbody>
			@foreach($scores as $score)
				<tr>
					<?php $exercise = Exercise::find($score->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $score->percentage }}% </td>
					<td> {{ $score->count }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Exercise practice frequency comparison</h3>
	<p class="section-subtitle">This is a comparison between {{ $user->first_name }}'s most and least practiced and poorest exercises in {{ $subject->subject_name }}. </p>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>Exercise</th>
				<th>Frequency of practice</th>
				<th>Percentage score</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Most practiced exercise</td>
				@foreach($popular_exercise as $popular)
					<?php $exercise = Exercise::find($popular->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $popular->count }} </td>
					<td> {{ $popular->percentage }}% </td>
				@endforeach
			</tr>
			<tr>
				<td>Least practiced exercise</td>
				@foreach($unpopular_exercise as $unpopular)
					<?php $exercise = Exercise::find($unpopular->exercise_id) ?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $unpopular->count }} </td>
					<td> {{ $unpopular->percentage }}% </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

@stop