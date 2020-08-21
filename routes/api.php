<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('priorities' , 'PrioritiesController@index'); //get all issues
Route::get('priorities/low' , 'PrioritiesController@getLowPriority'); //get all issues
Route::get('priorities/medium' , 'PrioritiesController@getMedPriority'); //get all issues
Route::get('priorities/high' , 'PrioritiesController@getHighPriority'); //get all issues
Route::get('priorities/{id}' , 'PrioritiesController@show'); //get one issue
