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
use App\Http\Controllers\Accounts\HomeController;
use App\Http\Controllers\Accounts\AccountsController;
use App\Http\Controllers\Issues\IssuesController;
use App\Http\Controllers\Projects\ProjectsController;
use App\Http\Controllers\Watching\WatchingController;

Route::get('/', [HomeController::class, 'welcome'])->name('home-page');
Route::post('/', [HomeController::class, 'welcome'])->name('logout-page');

Auth::routes();

Route::get('/home', [AccountsController::class, 'dashboard'])->name('dashboard');

// administration routes
Route::get('/admin/users', [AccountsController::class , 'admin'])->name('admin-main');
Route::get('/admin/users/{id}/edit', [AccountsController::class, 'edit'])->name('admin-user-edit');
Route::patch('/admin/users/{id}', [AccountsController::class, 'update'])->name('admin-user-update');
Route::delete('/admin/users/{id}', [AccountsController::class, 'destroy'])->name('admin-user-delete');
Route::get('/admin/user/profile', [AccountsController::class, 'profile'])->name('admin-user-profile');
Route::patch('/admin/user/store', [AccountsController::class, 'storeProfile'])->name('admin-user-profile-store');
Route::get('/admin/user/update', [AccountsController::class, 'updateProfile'])->name('admin-user-profile-update');
//Route::get('/admin', [AccountsController::class, 'index'])->name('admin);
//Route::post('/admin/users/{id}', [AccountsController::class, 'store']);


// Projects routes
Route::get('/projects', [ProjectsController::class ,'index'])->name('projects-home');
Route::get('/projects/assignment', [ProjectsController::class, 'assign']);
Route::get('/projects/assignment/{id}', [ProjectsController::class, 'assignment']);
Route::patch('/projects/assignment/{id}/update', [ProjectsController::class, 'usersAssignment']);
Route::get('/project/create', [ProjectsController::class, 'create']);
Route::get('/project/{id}', [ProjectsController::class, 'show']);
Route::delete('/project/{id}/destroy', [ProjectsController::class, 'destroy']);
Route::post('/project', [ProjectsController::class, 'store']);
Route::get('/project/{id}/edit', [ProjectsController::class, 'edit']);
Route::patch('/project/{id}', [ProjectsController::class, 'update']);


// Issues routes
Route::get('/issues', [IssuesController::class, 'index']);
Route::get('/priority', [IssuesController::class, 'priority']);
Route::get('/status', [IssuesController::class, 'status']);
Route::get('/issues/assigned', [IssuesController::class, 'assigned']);
Route::get('/issues/reported', [IssuesController::class, 'reported']);
Route::get('/tickets/{id}', [IssuesController::class, 'issues']);
Route::get('/issue/create/{project_id}', [IssuesController::class, 'create']);
Route::get('/issue/{id}', [IssuesController::class, 'show']);
Route::post('/issue/{project_id}', [IssuesController::class, 'store']);
Route::get('/issue/{id}/edit', [IssuesController::class, 'edit']);
Route::patch('/issue/{id}', [IssuesController::class, 'update']);

// Watch issues routes
Route::get('/watching', [WatchingController::class, 'index']);
Route::post('/watch/{id}', [WatchingController::class, 'store']);

// axios
Route::get('/usersList' , [AccountsController::class, 'usersList'])->name('user-table');
