@extends('layouts.backend')

@section('heading')
Welcome to the Recall Teacher Dashboard
@stop

@section('content')

<h4>View performance reports:</h4>
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



<h4>You can also perform the following actions:</h4>
<div>
	<btn class="report-btn">
		<div class="rbn-icon left">
			<span class="fa fa-pencil"></span>
		</div>
		<div class="rbn-text">
			<a href="/subjects/create">
				<h5>Add new subject</h5>
				<p>Click here to add a new subject</p>
			</a>
		</div>
	</btn>

	<br>

	<btn class="report-btn">
		<div class="rbn-icon left">
			<span class="fa fa-pencil"></span>
		</div>
		<div class="rbn-text">
			<a href="/books/create">
				<h5>Add new book</h5>
				<p>Click here to add a new book</p>
			</a>
		</div>
	</btn>
</div>
@stop