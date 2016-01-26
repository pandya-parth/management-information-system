<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/', function () {
    return view('welcome');
 });
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::resource('/companies','CompaniesController');
    Route::resource('/people','PeoplesController');
    Route::resource('/projects','ProjectsController');
    Route::resource('/project-categories','ProjectCategoriesController');
    Route::get('projectCategories', 'ProjectCategoriesController@getProjectCategories');
    Route::get('taskCategories', 'TaskCategoriesController@getTaskCategories');
    Route::resource('/milestones','MilestonesController');
    Route::resource('/tasks','TasksController');
    Route::resource('/task-categories','TaskCategoriesController');
    Route::post('change-password', 'UserController@updatePassword');
	Route::get('change-password', 'UserController@changePassword');
});
