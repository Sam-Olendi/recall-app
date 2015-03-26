<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function(){
	return View::make('index');
});


# Aliases for complex routes
Route::get('/learner/register', 'LearnersController@create');
Route::get('/learner/login', 'LearnersSessionController@create');
Route::get('/learner/logout', 'LearnersSessionController@destroy');

Route::get('/teacher/register', 'TeachersController@create');
Route::get('/teacher/login', 'TeachersSessionController@create');
Route::get('/teacher/logout', 'TeachersSessionController@destroy');


Route::post('/subjects/{subject}/exercises/{exercise}/questions/validate', 'QuizController@store');


# Redirects
Route::get('/login', function(){
	return Redirect::to('/');
});


# These are resources for simplyfing CRUD operations and making them RESTful.
Route::resource('learners', 'LearnersController');
Route::resource('learnersession', 'LearnersSessionController', ['only' => ['create', 'store', 'destroy']]);
Route::resource('teachers', 'TeachersController');
Route::resource('teachersession', 'TeachersSessionController', ['only' => ['create', 'store', 'destroy']]);
Route::resource('books', 'BooksController', ['except' => 'show']);
Route::resource('subjects', 'SubjectsController');
Route::resource('subjects.exercises', 'ExercisesController');
Route::resource('subjects.exercises.questions', 'QuestionsController', ['except' => 'index']);
// Route::resource('subjects.exercises.questions.answers', 'AnswersController');



Route::group(['prefix' => '/learner', 'before' => 'auth'], function(){

	Route::get('/', function(){ 
		return View::make('frontend.accounts.landing'); 
	});

	Route::get('/classroom', 'LearnersSubjectsController@index');
	Route::get('/classroom/subjects/{subject}', 'LearnersSubjectsController@show');
	Route::get('/classroom/subjects/{subject}/exercises/{exercise}', 'LearnersExercisesController@show');
	Route::get('/library', 'LearnersBooksController@index');
	Route::get('/profile', 'LearnersController@index');

});

Route::group(['prefix' => '/teacher', 'before' => 'auth'], function(){

	Route::get('/', function(){ 
		return View::make('backend.accounts.landing'); 
	});

	Route::get('/dashboard', function(){
		return View::make('backend.dashboard');
	});

	Route::get('/mybooks', 'BooksController@index');
	Route::get('/mysubjects', 'SubjectsController@index');
	Route::get('/myexercises', 'ExercisesController@index');
	Route::get('/mylearners', 'StudentsController@index');
	Route::get('/dashboard', 'PerformancesController@index');
	Route::post('/dashboard/{learner}/report', 'PerformancesController@report');
	Route::get('/profile', 'TeachersController@index');
	Route::get('/mystudents', 'StudentsController@index');
	Route::get('/mystudents/create', 'StudentsController@create');
	Route::post('/mystudents', 'StudentsController@store');
	Route::get('/mystudents/{student}/edit', 'StudentsController@edit');
	Route::put('/mystudents/{student}', 'StudentsController@update');
	Route::get('/learner/subscribe', 'StudentsController@subscribe');
	Route::get('/learner/subscribe/{learner}', 'StudentsController@storeSubscription');

	Route::get('/performance', 'PerformancesController@overall');
	Route::get('/performance/learners/', 'PerformancesController@showLearners');
	Route::get('/performance/{learner}', 'PerformancesController@show');
	Route::get('/performance/yes/', 'PerformancesController@getSubjects');


	Route::get('/performance/overall/export', 'ExportsController@overall');
	Route::get('/performance/{learner}/report/export', 'ExportsController@report');
	Route::get('/performance/{learner}/report/{subject}/export', 'ExportsController@subject');


});