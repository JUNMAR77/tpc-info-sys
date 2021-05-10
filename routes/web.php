<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\DashboardController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
	Route::get('app/about', 'App\Http\Controllers\DashboardController@about');
	Route::get('events', 'App\Http\Controllers\EventsController@index');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['only' => ['index', 'destroy']]);
	Route::get('user/create/employee','App\Http\Controllers\UserController@createEmployee');
	Route::get('user/create/student','App\Http\Controllers\UserController@createStudent');
	Route::post('user/store/employee','App\Http\Controllers\UserController@storeEmployee');
	Route::post('user/store/student','App\Http\Controllers\UserController@storeStudent');
	Route::get('user/show/employees/{employee}','App\Http\Controllers\UserController@showEmployee');
	Route::get('user/show/students/{student}','App\Http\Controllers\UserController@showStudent');
	Route::get('user/edit/employees/{employee}','App\Http\Controllers\UserController@editEmployee');
	Route::get('user/edit/students/{student}','App\Http\Controllers\UserController@editStudent');
	Route::put('user/update/employees/{employee}','App\Http\Controllers\UserController@updateEmployee');
	Route::put('user/update/students/{student}','App\Http\Controllers\UserController@updateStudent');
	Route::get('user/log','App\Http\Controllers\UserController@log');
	Route::delete('user/log/{activity}/destroy','App\Http\Controllers\UserController@logDestroy');
	Route::delete('user/log/destroy/all','App\Http\Controllers\UserController@logDestroyAll');

	Route::get('users/{user}/set_writer','App\Http\Controllers\UserController@setAsWriter');
	Route::get('users/{user}/unset_writer','App\Http\Controllers\UserController@unsetAsWriter');
	Route::get('users/{user}/set_moderator','App\Http\Controllers\UserController@setAsModerator');
	Route::get('users/{user}/unset_moderator','App\Http\Controllers\UserController@unsetAsModerator');
	Route::get('users/{user}/set_admin','App\Http\Controllers\UserController@setAsAdmin');
	Route::get('users/{user}/unset_admin','App\Http\Controllers\UserController@unsetAsAdmin');

	Route::resource('faculties','App\Http\Controllers\FacultyController');
	Route::get('archived/faculties','App\Http\Controllers\FacultyController@archived');
	Route::get('faculties/{faculty}/archive','App\Http\Controllers\FacultyController@setAsArchived');
	Route::get('faculties/{faculty}/unarchive','App\Http\Controllers\FacultyController@setAsUnarchived');
	Route::get('faculties/{faculty}/load','App\Http\Controllers\FacultyController@load');
	Route::get('faculties/{faculty}/load/{class}','App\Http\Controllers\FacultyController@classGrades');
	Route::get('faculties/{faculty}/load/{class}/encode','App\Http\Controllers\FacultyController@encodeGrades');
	Route::delete('faculties/{faculty}/destroy','App\Http\Controllers\FacultyController@logDestroy');
	Route::post('faculties/{faculty}/update','App\Http\Controllers\FacultyController@update');
	Route::get('faculties/{faculty}/edit','App\Http\Controllers\FacultyController@edit');

	Route::get('students/{student}/enlist','App\Http\Controllers\StudentController@enlist');
	Route::delete('students/enlistment/{grade}/drop','App\Http\Controllers\StudentController@dropClass');
	Route::post('students/enlist_class','App\Http\Controllers\StudentController@enlistClass');
	Route::post('students/enlist_class','App\Http\Controllers\StudentController@enlistClass');
	Route::resource('messages','App\Http\Controllers\MessagesController')->only(['show', 'destroy']);
	Route::get('feedback', 'App\Http\Controllers\MessagesController@feedback');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar']], function () {
	Route::resource('classes','App\Http\Controllers\SClassController');
	Route::get('classes/{class}/drop/{grade}','App\Http\Controllers\SClassController@dropStudent');
	Route::post('classes/lock_grades','App\Http\Controllers\SClassController@lockGrades');
	Route::get('classes/enroll_students/{class}','App\Http\Controllers\GradeController@enrollStudent');
	Route::resource('grades','App\Http\Controllers\GradeController')->except([
		'create', 'index', 'show'
	]);
	Route::get('faculty/load/completion/{grade}','App\Http\Controllers\GradeController@enterCompletionGrade');
	Route::put('faculty/load/completion/{grade}/update','App\Http\Controllers\GradeController@storeCompletionGrade');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar']], function () {
	Route::resource('events','App\Http\Controllers\EventsController')->except([
		'show', 'index'
	]);

	Route::resource('acad_terms','App\Http\Controllers\AcadTermController')->except('show');
	Route::put('settings/set_cur_acad_term/{setting}','App\Http\Controllers\SettingsController@setCurAcadTerm');

	Route::resource('curriculums','App\Http\Controllers\CurriculumController');
	Route::resource('curriculum_details','App\Http\Controllers\CurriculumDetailsController')->except([
		'index', 'create', 'show'
	]);
	Route::get('curriculum_details/create/{curriculum}','App\Http\Controllers\CurriculumDetailsController@create');
	Route::resource('courses','App\Http\Controllers\CourseController')->except('show');
	Route::put('settings/set_cur_curriculum/{setting}','App\Http\Controllers\SettingsController@setCurCurriculum');

	Route::resource('students','App\Http\Controllers\StudentController');
	Route::get('archived/students','App\Http\Controllers\StudentController@archived');
	Route::get('students/{student}/archive','App\Http\Controllers\StudentController@setAsArchived');
	Route::get('students/{student}/unarchive','App\Http\Controllers\StudentController@setAsUnarchived');
	Route::get('unpaid/students','App\Http\Controllers\StudentController@unpaidStudents');
	Route::get('students/{student}/paid','App\Http\Controllers\StudentController@setAsPaidStudent');
	Route::get('students/{student}/unpaid','App\Http\Controllers\StudentController@setAsUnpaidStudent');
	Route::get('graduate/students','App\Http\Controllers\StudentController@graduateStudents');

	Route::get('students/{student}/grades','App\Http\Controllers\StudentController@grades');
	Route::get('students/{student}/enlistment','App\Http\Controllers\StudentController@enlistment');
	Route::get('students/{student}/curriculum','App\Http\Controllers\StudentController@curriculum');

	Route::resource('students/{student}/credited_courses','App\Http\Controllers\CreditedCoursesController');
	Route::resource('students/{student}/{credit}/credit_course',
					'App\Http\Controllers\CreditedCoursesDetailsController')->except([ 'index', 'show' ]);

	Route::get('settings', 'App\Http\Controllers\DashboardController@settings');
	Route::post('settings', 'App\Http\Controllers\DashboardController@updateSettings');
	Route::get('announcement', 'App\Http\Controllers\DashboardController@announcement');
	Route::post('announcement', 'App\Http\Controllers\DashboardController@updateAnnouncement');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|head registrar|student']], function () {
	Route::resource('grades','App\Http\Controllers\GradeController')->only([
		'index', 'show'
	]);

	Route::get('students/{student}/grade_slip/{acad_term}','App\Http\Controllers\StudentController@showGradeSlip');
	Route::get('students/{student}/scholastic_record/{acad_term}','App\Http\Controllers\StudentController@showScholasticRecord');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar|faculty']], function () {
	Route::get('faculty/load/inc/{grade}','App\Http\Controllers\FacultyAccessController@setAsIncomplete');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|student']], function () {
	Route::get('students/{student}/curriculum_with_grades','App\Http\Controllers\StudentController@showCurriculumWithGrades');
});

Route::group(['middleware' => ['auth', 'role:admin|registrar|head registrar|faculty']], function () {
	Route::get('summary_grades/{class}/{period}/download','App\Http\Controllers\FileSummaryOfGrades@download');
	Route::get('summary_grades/{class}/{period}/view','App\Http\Controllers\FileSummaryOfGrades@view');
});

Route::group(['middleware' => ['auth', 'role:admin|head registrar|faculty']], function () {
	Route::get('summary_grades/{class}/{period}','App\Http\Controllers\FileSummaryOfGrades@index');
	Route::put('summary_grades/{class}/{period}/store','App\Http\Controllers\FileSummaryOfGrades@store');
	Route::get('summary_grades/{class}/{period}/remove','App\Http\Controllers\FileSummaryOfGrades@remove');
});

Route::group(['middleware' => ['auth', 'role:head registrar']], function () {
	Route::resource('registrars','App\Http\Controllers\RegistrarController');
	Route::get('archived/registrars','App\Http\Controllers\RegistrarController@archived');
	Route::get('registrars/{registrar}/archive','App\Http\Controllers\RegistrarController@setAsArchived');
	Route::get('registrars/{registrar}/unarchive','App\Http\Controllers\RegistrarController@setAsUnarchived');
});

Route::group(['middleware' => ['auth', 'role:registrar']], function () {
	Route::get('students/{student}/tor','App\Http\Controllers\StudentController@showTOR');
});

Route::group(['middleware' => ['auth', 'role:admin|faculty']], function () {
	Route::resource('faculty','App\Http\Controllers\FacultyAccessController')->only(['index', 'update']);

	Route::get('faculty/load','App\Http\Controllers\FacultyAccessController@load');
	Route::get('faculty/load/unofficial_drop/{grade}','App\Http\Controllers\FacultyAccessController@unofficialDropStudent');
	Route::get('faculty/load/{class}','App\Http\Controllers\FacultyAccessController@show');
	Route::get('faculty/load/{class}/encode','App\Http\Controllers\FacultyAccessController@encodeGrades');
	Route::get('faculty/load/{class}/students','App\Http\Controllers\FacultyAccessController@showStudentMasterlist');
});

Route::group(['middleware' => ['auth', 'role:student']], function () {
	Route::resource('student', 'App\Http\Controllers\StudentAccessController')->only('index');

	Route::get('student/enlistment','App\Http\Controllers\StudentAccessController@enlistment');
	Route::get('student/curriculum','App\Http\Controllers\StudentAccessController@curriculum');
});