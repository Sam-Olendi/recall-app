@extends('layouts.exports')


@section('title')
	{{ $user->first_name }} {{ $user->last_name }}'s Performance in {{ $subject->subject_name }}
@stop


@section('content')

<section>
	<h3 class="section-title">Overall performance</h3>
	<p class="section-subtitle">This is {{ $user->first_name }}'s overall score in {{ $subject->subject_name }}. It has been calculated by adding their total scores and getting the overall percentage score of the learner.</p>
</section>

<section>
	<h3 class="section-title">Overall performance comparison</h3>
	<p class="section-subtitle">This is a comparison between {{ $user->first_name }}'s best and poorest performances.</p>
</section>

<section>
	<h3 class="section-title">Exercise performance</h3>
	<p class="section-subtitle">This is {{ $user->first_name }}'s performance according to exercise.</p>
</section>

<section>
	<h3 class="section-title">Exercise practice frequency comparison</h3>
	<p class="section-subtitle">This is a comparison between {{ $user->first_name }}'s most and least practiced and poorest exercises in {{ $subject->subject_name }}. </p>
</section>

@stop