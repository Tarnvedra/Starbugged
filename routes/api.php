<?php


use Illuminate\Http\Request;
use App\Http\Controllers\Priorities\PrioritiesController;
use App\Http\Controllers\Status\StatusController;
use App\Http\Controllers\Datatables\DataTableController;
use App\Http\Controllers\Watching\WatchingController;

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

// priorities api
Route::get('/priorities', [PrioritiesController::class, 'index']); //get all issues by priority
Route::get('/priorities/low', [PrioritiesController::class, 'getLowPriority']); //get all issues with low priority status
Route::get('/priorities/medium', [PrioritiesController::class, 'getMediumPriority']); //get all issues with medium priority status
Route::get('/priorities/high', [PrioritiesController::class, 'getHighPriority']); //get all issues with high priority status
Route::get('/priorities/{id}', [PrioritiesController::class, 'show']); //get one issue

// status api
Route::get('/status', [StatusController::class, 'index']); //get all issues by status
Route::get('/status/created', [StatusController::class, 'created']); // get all issues by issue created status
Route::get('/status/progress', [StatusController::class, 'progress']); // get all issues by in progress status
Route::get('/status/resolved', [StatusController::class, 'resolved']); // get all issues by in resolved status
Route::get('/status/{id}', [StatusController::class, 'show']); //get one issue

// watch api
//Route::post('/watch/{id}', [WatchingController::class, 'store']);

// datatable api's

Route::get('/users', [DataTableController::class, 'users'])->name('table.users');
