<?php

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

//Route::get('/', function () { 
//	return view('home'); 
//});

Route::get('/', 'PagesController@index');
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm'); // show form
Route::post('users/register', 'Auth\RegisterController@register');
Route::get('users/logout', 'Auth\LoginController@logout');
// Route::get('users/login', 'Auth\LoginController@showLoginForm');
// we use 'users/login' Route instead of 'login/'. 
// If unauthorized user tries access secret page, Laravel redirects to 'login/ NOT 'users/login. named Route solves
Route::get('users/login', 'Auth\LoginController@showLoginForm')->name('login'); // show form
Route::post('users/login', 'Auth\LoginController@login');


Route::get('employees/{id}', 'FrontController@show');
Route::get('employee/{id}/week/{weekid}', 'FrontController@showByWeek');
Route::get('employee/{id}/week/{weekid}/proj/{projId}', 'FrontController@showByWeekAndProj');

//Route::get('employee/{id}/week/{weekid}/proj/{projId}', ['as'=>'showByWeekAndProj', 'uses'=>'FrontController@showByWeekAndProj']);


Route::get('projects/', 'ProjectsController@index');
Route::get('projects/{id}', 'ProjectsController@show');


/* 
============= 
 Admin 
 ===========
Route::group(
	// array('prefix'=>'admin', 'namespace'=>'Admin',	'middleware'=>'auth'), 
	array('prefix'=>'admin', 'namespace'=>'Admin',	'middleware'=>'manager'), 
	function ()	{ 
		Route::get('users', 'UsersController@index'); 			
	}
);
*/

Route::group(
	array('prefix' => 'admin', 'namespace'=>'Admin', 'middleware'=>'manager'),	
	function ()	{ 
		// admin Root
		Route::get('/', 'PagesController@home');

		// Route::get('users', 'UsersController@index'); 
		Route::get('users',	['as' => 'admin.user.index', 'uses' => 'UsersController@index']);

		//Roles : create some roles
		Route::get('roles',	'RolesController@index');
		Route::get('roles/create',	'RolesController@create');
		Route::post('roles/create',	'RolesController@store');

		// Assign roles to users
		Route::get('users/{id?}/edit',	'UsersController@edit');
		Route::post('users/{id?}/edit','UsersController@update');

		// weeks 
		Route::get('weeks', 'WeeksController@index');
		Route::get('weeks/create',	'WeeksController@create');
		Route::post('weeks/create',	'WeeksController@store');
		Route::get('weeks/{id?}/edit',	'WeeksController@edit');
		Route::post('weeks/{id?}/edit','WeeksController@update');

		// Employees
		Route::get('employees', 'EmployeesController@index');
		Route::get('employees/create',	'EmployeesController@create');
		Route::post('employees/create',	'EmployeesController@store');
		Route::get('employees/{id?}/edit',	'EmployeesController@edit');
		Route::post('employees/{id?}/edit','EmployeesController@update');

		// Employees
		Route::get('timesheets', 'TimesheetsController@index');
		Route::get('timesheets/create',	'TimesheetsController@create');
		Route::post('timesheets/create',	'TimesheetsController@store');
		Route::get('timesheets/{id?}/edit',	'TimesheetsController@edit');
		Route::post('timesheets/{id?}/edit','TimesheetsController@update');
		Route::get('timesheets/{id?}/destroy',	'TimesheetsController@destroy');

		// projects 
		Route::get('projects', 'ProjectsController@index');
		Route::get('projects/create',	'ProjectsController@create');
		Route::post('projects/create',	'ProjectsController@store');


	}
);
