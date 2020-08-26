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
// prirorties api
Route::get('/priorities' , 'PrioritiesController@index'); //get all issues by priority
Route::get('/priorities/low' , 'PrioritiesController@getLowPriority'); //get all issues with low priority status
Route::get('/priorities/medium' , 'PrioritiesController@getMedPriority'); //get all issues with medium priority status
Route::get('/priorities/high' , 'PrioritiesController@getHighPriority'); //get all issues with high priority status
Route::get('/priorities/{id}' , 'PrioritiesController@show'); //get one issue
// status api
Route::get('/status' , 'StatusController@index'); //get all issues by status
Route::get('/status/created' , 'StatusController@created'); // get all issues by issue created status
Route::get('/status/progress' , 'StatusController@progress'); // get all issues by in progress status
Route::get('/status/resolved' , 'StatusController@resolved'); // get all issues by in resolved status
Route::get('/status/{id}' , 'StatusController@show'); //get one issue
// watch api
Route::post('/watch/{id}' , 'WatchingController@store');
