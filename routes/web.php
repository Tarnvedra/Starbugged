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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'AccountsController@dashboard');
// projects
Route::get('/projects', 'ProjectsController@index');
Route::get('/project/create' , 'ProjectsController@create');
Route::get('/project/{id}' , 'ProjectsController@show');
Route::post('/project','ProjectsController@store');
Route::get('/project/{id}/edit' ,'ProjectsController@edit');
Route::patch('/project/{id}' ,'ProjectsController@update');
// Issues
Route::get('/issues', 'IssuesController@index');
Route::get('/priority' , 'IssuesController@priority');
Route::get('/status' , 'IssuesController@status');
Route::get('/issue/create/{project_id}', 'IssuesController@create');
Route::get('/issue/{id}' , 'IssuesController@show');
Route::post('/issue/{project_id}','IssuesController@store');
Route::get('/issue/{id}/edit' ,'IssuesController@edit');
Route::patch('/issue/{id}' , 'IssuesController@update');
// administration
Route::get('/admin', 'AccountsController@index');
Route::get('/admin/users', 'AccountsController@admin');
//Route::post('/admin/users/{id}','AccountsController@store');
Route::get('/admin/users/{id}/edit' ,'AccountsController@edit');
Route::patch('/admin/users/{id}' , 'AccountsController@update');
Route::delete('/admin/users/{id}' , 'AccountsController@destroy');

