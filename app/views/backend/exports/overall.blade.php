@extends('layouts.exports')


@section('title')
	Overall Student Performance
@stop


@section('content')

<section>
	<h3 class="section-title">Learner performance</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>

	<table>
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th>Percentage performance</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Top Learner</td>
				@foreach($best_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					<td>{{ $user->first_name }} {{ $user->last_name }}</td>
					<td>{{ $percentage }}% </td>
				@endforeach
			</tr>
			<tr>
				<td>Poorest Learner</td>
				@foreach($worst_student as $learner_id => $percentage)
				<?php $user = User::find($learner_id) ?>
					<td>{{ $user->first_name }} {{ $user->last_name }}</td>
					<td>{{ $percentage }}% </td>
				@endforeach
			</tr>
		</tbody>
	</table>

</section>



<section>
	<h3 class="section-title">Performance per subject</h3>
	<p class="section-subtitle">This list shows the performance per subject of your learners</p>

	<table>
		<thead>
			<tr>
				<th>Subject</th>
				<th>Percentage</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subject_performance as $performance)
				<tr>
				<?php $subject = Subject::find($performance->subject_id) ?>
					<td>{{ $subject->subject_name }}</td>
					<td>{{ round(($performance->scores/$performance->totals)*100, 2) }}%</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</section>



<section>
	<h3 class="section-title">Subject performance comparisons</h3>

	<h4 class="section-title">Best and least performing subjects</h4>
	<p class="section-subtitle">The following subjects have the best and worst overall performances respectively. The figures below are the total percentages scored by your learners collectively in all their exercises.</p>

	<table>
		<thead>
			<tr>
				<th></th>
				<th>Subject</th>
				<th>Percentage performance</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Best performing subject</td>
				@foreach($best_score as $key => $best_score)
					<?php $subject = Subject::find($key) ?>
					<td>{{ $subject->subject_name }}</td>
					<td>{{ $best_score }}%</td>
				@endforeach
			</tr>
			<tr>
				<td>Worst performing subject</td>
				@foreach($worst_score as $key => $worst_score)
					<?php $subject = Subject::find($key) ?>
					<td>{{ $subject->subject_name }}</td>
					<td>{{ $worst_score }}%</td>
				@endforeach
			</tr>
		</tbody>
	</table>


	<h4 class="section-title">Best and least performing exercises</h4>
	<p class="section-subtitle">Below are the exercises with the overall best and worst learner performances. The figures shown are the total percentages scored by your learners collectively in both the exercises.</p>

	<table>
		<thead>
			<tr>
				<th></th>
				<th>Subject</th>
				<th>Percentage performance</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Best performing exercise</td>
				@foreach($best_exercise as $exercise_id => $percentage)
					<?php $exercise = Exercise::find($exercise_id) ?>
					<td>{{ $exercise->exercise_name }} </td>
					<td>{{ $percentage }}%</td>
				@endforeach
			</tr>
			<tr>
				<td>Least performing exercise</td>
				@foreach($worst_exercise as $exercise_id => $percentage)
					<?php $exercise = Exercise::find($exercise_id) ?>
					<td>{{ $exercise->exercise_name }}</td>
					<td>{{ $percentage }}%</td>
				@endforeach
			</tr>
		</tbody>
	</table>

	

	
</section>



<section>
	<h3 class="section-title">Learner Rankings</h3>
	<p class="section-subtitle">This is a ranking of your learners.</p>
	<table>
		<thead>
			<tr>
				<th>Learner</th>
				<th>Overall percentage</th>
			</tr>
		</thead>
		<tbody>
			@foreach($top_five_students as $learner_id => $percentage)
				<tr>
					<?php $user = User::find($learner_id); ?>
					<td> {{ $user->first_name }} {{ $user->last_name }} </td>
					<td> {{ $percentage }} </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</section>

@stop