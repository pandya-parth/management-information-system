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

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('/home', 'HomeController@index');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('/companies','CompaniesController');

    
    Route::resource('/projects','ProjectsController');
    Route::resource('/milestones','MilestonesController');
    Route::resource('/project-categories','ProjectCategoriesController');
    Route::resource('/people','PeoplesController');
    Route::resource('projects.tasks','TasksController');

    Route::get('project/{id}/people','PeoplesController@getProjectPeople');
    Route::post('project/{id}/people','PeoplesController@postProjectPeople');
    
    Route::resource('project.people','PeoplesController');
    Route::resource('/task-categories','TaskCategoriesController');    
    Route::resource('projects.milestones','MilestonesController');
    Route::post('change-password', 'UserController@updatePassword');
    Route::get('change-password', 'UserController@changePassword');

    Route::post('/logtimes','TasksController@logStore');
    Route::post('/logtimes/{id}','TasksController@logUpdate');
    Route::get('/logtimes/{id}','TasksController@logDestroy');
});

Route::group(['middleware' => ['web','auth'],  'prefix' => 'api'], function () {
    Route::get('companies', 'CompaniesController@getCompanies');
    Route::get('company/{id}','CompaniesController@getCompany');

    Route::get('milestones', 'MilestonesController@getMilestones');
    Route::get('milestone/{id}','MilestonesController@getMilestone');

    Route::get('task-categories', 'TaskCategoriesController@getTaskCategories');
    Route::get('task-category/{id}','TaskCategoriesController@getTaskCategory');

    Route::get('logtimes', 'TasksController@getLogtimes');
    Route::get('logtime/{id}','TasksController@getLogtime');

    Route::get('tasks', 'TasksController@getTasks');
    Route::get('task/{id}','TasksController@getTask');
    Route::get('task-Categories', 'TasksController@getCategories');

    Route::get('project-categories', 'ProjectCategoriesController@getProjectCategories');
    Route::get('people', 'PeoplesController@getPeoples');
    
    Route::get('projects','ProjectsController@getProjects');
    Route::get('project-category/{id}','ProjectCategoriesController@getCategory');
    Route::get('people/{id}','PeoplesController@getPeople');
    Route::get('projects/{id}','ProjectsController@getProject');
});
