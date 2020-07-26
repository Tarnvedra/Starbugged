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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/projects', 'ProjectsController@index');
Route::get('/p/create' , 'ProjectsController@create');
Route::post('/p','ProjectsController@store');
Route::get('/issues', 'PagesController@issues');
Route::get('/account', 'PagesController@account');
