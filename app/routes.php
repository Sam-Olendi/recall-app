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
Route::resource('teachers', 'TeachersController', ['except' => 'index']);
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
	Route::get('/dashboard', 'PerformancesController@index');
	Route::get('/dashboard/{learner}', 'PerformancesController@show');
	Route::post('/dashboard/{learner}/report', 'PerformancesController@report');

});