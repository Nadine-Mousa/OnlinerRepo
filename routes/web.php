<?php

use Illuminate\Support\Facades\Route;

// User Routes

Route::get('/login_page', 'App\Http\Controllers\UserController@showLoginForm')->name('showLoginForm');

Route::post('/login', 'App\Http\Controllers\UserController@login')->name('login');

Route::get('/register', 'App\Http\Controllers\UserController@showRegisterForm')->name('showRegisterForm');

Route::post('/register', 'App\Http\Controllers\UserController@register')->name('register');


// Departments Routes

Route::get('/departments', 'App\Http\Controllers\DepartmentController@index')->name('departments.index');



// Levels Routes

Route::get('departments/{department}/levels', 'App\Http\Controllers\LevelController@index')->name('levels.index');


// Subjects Routes

Route::get('levels/{level}/subjects', 'App\Http\Controllers\SubjectController@index')->name('subjects.index');
Route::get('/subjects/{subject}', 'App\Http\Controllers\SubjectController@show')->name('subjects.show');
Route::get('/subjects/{subject}/ask_for_approve', 'App\Http\Controllers\SubjectController@ask_for_approve')->name('subjects.ask_for_approve');



// Questions Routes
Route::get('{user}/{subject}/questions', 'App\Http\Controllers\QuestionController@index')->name('questions.index');
Route::get('{user}/{subject}/questions/show/{question}', 'App\Http\Controllers\QuestionController@show')->name('questions.show');
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


// Option Routes
//create
Route::post('{user}/{subject}/{question}/options/store', 'App\Http\Controllers\OptionController@store')->name('options.store');
Route::get('{user}/{subject}/{question}/options/create', 'App\Http\Controllers\OptionController@create')->name('options.create');




// Exams Routes
Route::get('/exams', 'App\Http\Controllers\ExamController@index')->name('exams.index');
Route::post('/exams/storeAnswers', 'App\Http\Controllers\ExamController@storeAnswers')->name('exams.storeAnswers');
Route::post('/exams', 'App\Http\Controllers\ExamController@store')->name('exams.store');
Route::get('/exams/student_exams', 'App\Http\Controllers\ExamController@show_student_exams')->name('exams.student_exams');
Route::get('/exams/quiz', 'App\Http\Controllers\ExamController@takeExam')->name('exams.quiz');

Route::get('/exams/create', 'App\Http\Controllers\ExamController@create_exam')->name('exams.create_exam');
Route::post('/exams/store', 'App\Http\Controllers\ExamController@store_exam')->name('exams.store_exam'); 

Route::get('/exams/{exam}/show_results', 'App\Http\Controllers\ExamController@show_results')->name('exams.show_results');
Route::get('/exams/{exam}', 'App\Http\Controllers\ExamController@show')->name('exams.show');

Route::get('/student_exams/{exam}', 'App\Http\Controllers\ExamController@show_student_exam')->name('student_exam');


//Admin

Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_professor_requests')->name('dashboard');
Route::get('/dashboard/reject_prof/{professor}', 'App\Http\Controllers\AdminController@reject_professor')->name('dashboard.reject_prof');
Route::get('/dashboard/approve_prof/{professor}', 'App\Http\Controllers\AdminController@approve_professor')->name('dashboard.approve_prof');

Route::get('/dashboard/reject_prof_subject/{professor_subject}', 'App\Http\Controllers\AdminController@reject_professor_subject')->name('dashboard.reject_prof_subject');
Route::get('/dashboard/approve_prof_subject/{professor_subject}', 'App\Http\Controllers\AdminController@approve_professor_subject')->name('dashboard.approve_prof_subject' );

Route::get('/dashboard/departments', 'App\Http\Controllers\AdminController@show_departments')->name('dashboard.departments' );

//create departments
Route::post('/dashboard/departments/store', 'App\Http\Controllers\AdminController@departments_store')->name('dashboard.departments.store');
Route::get('/dashboard/departments/create', 'App\Http\Controllers\AdminController@departments_create')->name('dashboard.departments.create');
//edit departments
Route::get('/dashboard/departments/edit/{department}', 'App\Http\Controllers\AdminController@departments_edit')->name('dashboard.departments.edit');
Route::post('/dashboard/departments/update/{department}', 'App\Http\Controllers\AdminController@departments_update')->name('dashboard.departments.update');
//delete departments
Route::get('/dashboard/departments/delete/{department}', 'App\Http\Controllers\AdminController@departments_delete')->name('dashboard.departments.delete');




// Test route

Route::get('/hi', function(){
    return 'test working';
});

Route::get('/error', function(){
    return view('error');
});

//Route::get('/dashboard', function(){
  //  return view('admin.index');
//});

Route::get('/test', function(){
    return view('exams.show_results');
});
