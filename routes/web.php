<?php

use Illuminate\Support\Facades\Route;

// User Routes

Route::get('/login_page', 'App\Http\Controllers\UserController@showLoginForm')->name('showLoginForm');

Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');

Route::get('/registeration', 'App\Http\Controllers\UserController@showRegisterForm')->name('showRegisterForm');

Route::post('/register', 'App\Http\Controllers\UserController@register')->name('register');


// Departments Routes

Route::get('/departments', 'App\Http\Controllers\DepartmentController@index')->name('departments.index');



// Levels Routes

Route::get('departments/{department}/levels', 'App\Http\Controllers\LevelController@index')->name('levels.index');


// Subjects Routes

Route::get('levels/{level}/subjects', 'App\Http\Controllers\SubjectController@index')->name('subjects.index');
Route::get('/subjects/{subject}', 'App\Http\Controllers\SubjectController@show')->name('subjects.show');



// Questions Routes
Route::get('{user}/{subject}/questions', 'App\Http\Controllers\QuestionController@index')->name('questions.index');
//create
Route::post('{user}/{subject}/questions/store', 'App\Http\Controllers\QuestionController@store')->name('questions.store');
Route::get('{user}/{subject}/questions/create', 'App\Http\Controllers\QuestionController@create')->name('questions.create');
//delete
Route::get('{user}/{subject}/questions/trashed', 'App\Http\Controllers\QuestionController@trashed')->name('questions.trashed');
Route::get('{user}/{subject}/questions/destroy/{question}', 'App\Http\Controllers\QuestionController@destroy')->name('questions.destroy');
Route::get('{user}/{subject}/questions/hdelete/{question}', 'App\Http\Controllers\QuestionController@hdelete')->name('questions.hdelete');
Route::get('{user}/{subject}/questions/restore/{question}', 'App\Http\Controllers\QuestionController@restore')->name('questions.restore');
//edit
Route::get('{user}/{subject}/questions/edit/{question}', 'App\Http\Controllers\QuestionController@edit')->name('questions.edit');
Route::post('{user}/{subject}/questions/update/{question}', 'App\Http\Controllers\QuestionController@update')->name('questions.update');



// Exams Routes
Route::get('/exams', 'App\Http\Controllers\ExamController@index')->name('exams.index');
Route::get('/exams/{exam}', 'App\Http\Controllers\ExamController@show')->name('exams.show');
Route::post('/exams', 'App\Http\Controllers\ExamController@store')->name('exams.store');

// Test route

Route::get('/hi', function(){
    return 'test working';
});

Route::get('/error', function(){
    return view('error');
});

Route::get('/test', function(){
    return view('admin.index');
});

