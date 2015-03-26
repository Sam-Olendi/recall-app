@extends('layouts.exports')


@section('title')
	{{ $user->first_name }} {{ $user->last_name }} 
@stop


@section('content')

<section>
	<h3 class="section-title">Performance per subject</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
	<table>
		<thead>
			<tr>
				<th>Subject</th>
				<th>Percentage</th>
			</tr>
		</thead>
		<tbody>
			@foreach($subject_scores as $score)
				<tr>
				<?php $subject = Subject::find($score->subject_id) ?>
					<td>{{ $subject->subject_name }}</td>
					<td>{{ $score->percentage }}%</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Subject performance comparisons</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
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
				<td>Best Subject</td>
				@foreach($best_subject as $score)
					<?php $subject = Subject::find($score->subject_id) ?>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $score->percentage }}% </td>
				@endforeach
			</tr>
			<tr>
				<td>Worst Subject</td>
				@foreach($worst_subject as $score)
					<?php $subject = Subject::find($score->subject_id) ?>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $score->percentage }}% </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Subject performance frequencies</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
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
				<td>Most Practiced Subject</td>
				@foreach($popular_subject as $popular)
					<?php
						$subject = Subject::find($popular->subject_id);
					?>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $popular->percentage }}% </td>
				@endforeach
			</tr>
			<tr>
				<td>Least Practiced Subject</td>
				@foreach($unpopular_subject as $unpopular)
					<?php
						$subject = Subject::find($unpopular->subject_id);
					?>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $unpopular->percentage }}% </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Performance per exercise</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
	<table>
		<thead>
			<tr>
				<th>Exercise</th>
				<th>Subject</th>
				<th>Percentage</th>
				<th>Frequency</th>
			</tr>
		</thead>
		<tbody>
			@foreach($exercise_scores as $score)
				<tr>
				<?php 
					$subject = Subject::find($score->subject_id);
					$exercise = Exercise::find($score->exercise_id); 
				?>
					<td>{{ $exercise->exercise_name }}</td>
					<td>{{ $subject->subject_name }}</td>
					<td>{{ $score->percentage }}%</td>
					<td>{{ $score->count }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Exercise performance comparisons</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>Exercise</th>
				<th>Subject</th>
				<th>Percentage performance</th>
				<th>Frequency</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Best Exercise</td>
				@foreach($best_exercise as $score)
					<?php 
						$exercise = Exercise::find($score->exercise_id);
						$subject = Subject::find($score->subject_id);
					?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $score->percentage }}% </td>
					<td> {{ $score->count }} </td>
				@endforeach
			</tr>
			<tr>
				<td>Worst Exercise</td>
				@foreach($worst_exercise as $score)
					<?php 
						$exercise = Exercise::find($score->exercise_id);
						$subject = Subject::find($score->subject_id);
					?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $score->percentage }}% </td>
					<td> {{ $score->count }} </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

<section>
	<h3 class="section-title">Exercise performance frequencies</h3>
	<p class="section-subtitle">These are your best and least performing learners</p>
	<table>
		<thead>
			<tr>
				<th></th>
				<th>Exercise</th>
				<th>Subject</th>
				<th>Percentage performance</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Most Practiced Exercise</td>
				@foreach($popular_exercise as $popular)
					<?php
						$exercise = Exercise::find($popular->exercise_id);
						$subject = Subject::find($popular->subject_id);
					?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $popular->percentage }}% </td>
				@endforeach
			</tr>
			<tr>
				<td>Least Practiced Exercise</td>
				@foreach($unpopular_exercise as $unpopular)
					<?php
						$exercise = Exercise::find($unpopular->exercise_id);
						$subject = Subject::find($unpopular->subject_id);
					?>
					<td> {{ $exercise->exercise_name }} </td>
					<td> {{ $subject->subject_name }} </td>
					<td> {{ $unpopular->percentage }}% </td>
				@endforeach
			</tr>
		</tbody>
	</table>
</section>

@stop