<?php

use Illuminate\Support\Facades\Route;

// User Routes

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

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
Route::get('/options/delete/{option}', 'App\Http\Controllers\OptionController@delete')->name('options.delete');
Route::get('/options/edit/{option}', 'App\Http\Controllers\OptionController@edit')->name('options.edit');
Route::post('/options/update/{option}', 'App\Http\Controllers\OptionController@update')->name('options.update');




// Exams Routes
Route::get('/exams', 'App\Http\Controllers\ExamController@index')->name('exams.index');
Route::post('/exams/storeAnswers', 'App\Http\Controllers\ExamController@storeAnswers')->name('exams.storeAnswers');
Route::post('/exams', 'App\Http\Controllers\ExamController@store')->name('exams.store');



Route::get('/exams/student_exams', 'App\Http\Controllers\ExamController@show_student_exams')->name('exams.student_exams');
Route::get('/exams/quiz', 'App\Http\Controllers\ExamController@takeExam')->name('exams.quiz');
Route::get('/exams/create', 'App\Http\Controllers\ExamController@create_exam')->name('exams.create');
Route::post('/exams/store', 'App\Http\Controllers\ExamController@store_exam')->name('exams.store');


Route::get('/exams/create', 'App\Http\Controllers\ExamController@create_exam')->name('exams.create_exam');
Route::post('/exams/store', 'App\Http\Controllers\ExamController@store_exam')->name('exams.store_exam'); 
Route::get('/student_exams/{exam}', 'App\Http\Controllers\ExamController@show_student_exam')->name('student_exam');
Route::get('/exams/show_results/{exam}', 'App\Http\Controllers\ExamController@show_results')->name('exams.show_results');
Route::get('/exams/{exam}', 'App\Http\Controllers\ExamController@show')->name('exams.show_exam');

//edit & delete exam structur
Route::get('/exams/delete/{structure}', 'App\Http\Controllers\ExamController@delete_structure')->name('exams.delete_structure');

Route::get('/exams/edit/{structure}', 'App\Http\Controllers\ExamController@edit_structure')->name('exams.edit_structure');
Route::post('/exams/update/{structure}', 'App\Http\Controllers\ExamController@update_structure')->name('exams.update_structure');




//Admin

Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_professor_requests')->name('dashboard');
Route::get('/dashboard/reject_prof/{professor}', 'App\Http\Controllers\AdminController@reject_professor')->name('dashboard.reject_prof');
Route::get('/dashboard/approve_prof/{professor}', 'App\Http\Controllers\AdminController@approve_professor')->name('dashboard.approve_prof');

Route::get('/dashboard/reject_prof_subject/{professor_subject}', 'App\Http\Controllers\AdminController@reject_professor_subject')->name('dashboard.reject_prof_subject');
Route::get('/dashboard/approve_prof_subject/{professor_subject}', 'App\Http\Controllers\AdminController@approve_professor_subject')->name('dashboard.approve_prof_subject' );

Route::get('/dashboard/departments', 'App\Http\Controllers\AdminController@show_departments')->name('dashboard.departments' );
Route::get('/dashboard/levels', 'App\Http\Controllers\AdminController@show_levels')->name('dashboard.levels' );
Route::get('/dashboard/subjects', 'App\Http\Controllers\AdminController@show_subjects')->name('dashboard.subjects' );
Route::get('/dashboard/exams', 'App\Http\Controllers\AdminController@show_exams')->name('dashboard.exams' );
Route::get('/dashboard/professors', 'App\Http\Controllers\AdminController@show_professors')->name('dashboard.professors' );
Route::get('/dashboard/chapters', 'App\Http\Controllers\AdminController@show_chapters')->name('dashboard.chapters' );

//Route::get('/dashboard', 'App\Http\Controllers\AdminController@GetCount')->name('dashboard' );




//create departments
Route::post('/dashboard/departments/store', 'App\Http\Controllers\AdminController@departments_store')->name('dashboard.departments.store');
Route::get('/dashboard/departments/create', 'App\Http\Controllers\AdminController@departments_create')->name('dashboard.departments.create');
//edit departments
Route::get('/dashboard/departments/edit/{department}', 'App\Http\Controllers\AdminController@departments_edit')->name('dashboard.departments.edit');
Route::post('/dashboard/departments/update/{department}', 'App\Http\Controllers\AdminController@departments_update')->name('dashboard.departments.update');
//delete departments
Route::get('/dashboard/departments/delete/{department}', 'App\Http\Controllers\AdminController@departments_delete')->name('dashboard.departments.delete');

//create levels
Route::post('/dashboard/levels/store', 'App\Http\Controllers\AdminController@levels_store')->name('dashboard.levels.store');
Route::get('/dashboard/levels/create', 'App\Http\Controllers\AdminController@levels_create')->name('dashboard.levels.create');
//edit levels
Route::get('/dashboard/levels/edit/{level}', 'App\Http\Controllers\AdminController@levels_edit')->name('dashboard.levels.edit');
Route::post('/dashboard/levels/update/{level}', 'App\Http\Controllers\AdminController@levels_update')->name('dashboard.levels.update');
//delete levels
Route::get('/dashboard/levels/delete/{level}', 'App\Http\Controllers\AdminController@levels_delete')->name('dashboard.levels.delete');

//create subject
Route::post('/dashboard/subjects/store', 'App\Http\Controllers\AdminController@subjects_store')->name('dashboard.subjects.store');
Route::get('/dashboard/subjects/create', 'App\Http\Controllers\AdminController@subjects_create')->name('dashboard.subjects.create');
//edit subject
Route::get('/dashboard/subjects/edit/{subject}', 'App\Http\Controllers\AdminController@subjects_edit')->name('dashboard.subjects.edit');
Route::post('/dashboard/subjects/update/{subject}', 'App\Http\Controllers\AdminController@subjects_update')->name('dashboard.subjects.update');
//delete subject
Route::get('/dashboard/subjects/delete/{subject}', 'App\Http\Controllers\AdminController@subjects_delete')->name('dashboard.subjects.delete');



//create exam
Route::post('/dashboard/exams/store', 'App\Http\Controllers\AdminController@exams_store')->name('dashboard.exams.store');
Route::get('/dashboard/exams/create', 'App\Http\Controllers\AdminController@exams_create')->name('dashboard.exams.create');
//edit exam
Route::get('/dashboard/exams/edit/{exam}', 'App\Http\Controllers\AdminController@exams_edit')->name('dashboard.exams.edit');
Route::post('/dashboard/exams/update/{exam}', 'App\Http\Controllers\AdminController@exams_update')->name('dashboard.exams.update');
//deleteexam
Route::get('/dashboard/exams/delete/{exam}', 'App\Http\Controllers\AdminController@exams_delete')->name('dashboard.exams.delete');


//create prof
Route::post('/dashboard/professors/store', 'App\Http\Controllers\AdminController@professors_store')->name('dashboard.professors.store');
Route::get('/dashboard/professors/create', 'App\Http\Controllers\AdminController@professors_create')->name('dashboard.professors.create');
//edit prof
Route::get('/dashboard/professors/edit/{professor}', 'App\Http\Controllers\AdminController@professors_edit')->name('dashboard.professors.edit');
Route::post('/dashboard/professors/update/{professor}', 'App\Http\Controllers\AdminController@professors_update')->name('dashboard.professors.update');
//delete prof
Route::get('/dashboard/professors/delete/{professor}', 'App\Http\Controllers\AdminController@professors_delete')->name('dashboard.professors.delete');

// chapters
//create prof
Route::post('/dashboard/chapters/store', 'App\Http\Controllers\AdminController@chapters_store')->name('dashboard.chapters.store');
Route::get('/dashboard/chapters/create', 'App\Http\Controllers\AdminController@chapters_create')->name('dashboard.chapters.create');
//edit prof
Route::get('/dashboard/chapters/edit/{chapter}', 'App\Http\Controllers\AdminController@chapters_edit')->name('dashboard.chapters.edit');
Route::post('/dashboard/chapters/update/{chapter}', 'App\Http\Controllers\AdminController@chapters_update')->name('dashboard.chapters.update');
//delete prof
Route::get('/dashboard/chapters/delete/{chapters}', 'App\Http\Controllers\AdminController@chapters_delete')->name('dashboard.chapters.delete');




//create chapter
Route::post('/dashboard/chapters/store', 'App\Http\Controllers\AdminController@chapters_store')->name('dashboard.chapters.store');
Route::get('/dashboard/chapters/create', 'App\Http\Controllers\AdminController@chapters_create')->name('dashboard.chapters.create');
//edit chapter
Route::get('/dashboard/chapters/edit/{chapter}', 'App\Http\Controllers\AdminController@chapters_edit')->name('dashboard.chapters.edit');
Route::post('/dashboard/chapters/update/{chapter}', 'App\Http\Controllers\AdminController@chapters_update')->name('dashboard.chapters.update');
//delete chapter
Route::get('/dashboard/chapters/delete/{chapter}', 'App\Http\Controllers\AdminController@professors_delete')->name('dashboard.chapters.delete');



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
    return view('exams.edit_structur');
});


Route::get('home', 'App\Http\Controllers\UserController@home')->name('home');
Route::get('about', 'App\Http\Controllers\UserController@about')->name('about');
Route::get('contact', 'App\Http\Controllers\UserController@contact')->name('contact');
