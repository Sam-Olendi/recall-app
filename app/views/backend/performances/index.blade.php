@extends('layouts.backend')

@section('heading')
Learner Performance Reports
@stop

@section('content')

<div>
	<btn class="report-btn">
		<div class="rbn-icon left">
			<span class="fa fa-pencil"></span>
		</div>
		<div class="rbn-text">
			<a href="/teacher/performance">
				<h5>Overall student performance</h5>
				<p>Click here to view the general learner performance</p>
			</a>
		</div>
	</btn>

	{{-- <btn class="report-btn">
		<div class="rbn-icon left">
			<span class="fa fa-pencil"></span>
		</div>
		<div class="rbn-text">
			<a href="/teacher/performance/yes/">
				<h5>Performance per subject</h5>
				<p>Click here to view performance according to subject</p>
			</a>
		</div>
	</btn> --}}

	<br>

	<btn class="report-btn">
		<div class="rbn-icon left">
			<span class="fa fa-pencil"></span>
		</div>
		<div class="rbn-text">
			<a href="/teacher/performance/learners/">
				<h5>Individual learner performance</h5>
				<p>Click here to view detailed learner performances</p>
			</a>
		</div>
	</btn>

</div>

<hr>

@stop