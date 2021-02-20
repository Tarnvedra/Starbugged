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
use App\Http\Controllers\Board\BoardController;

Route::get('/', [HomeController::class, 'welcome'])->name('home-page');

Auth::routes();

Route::post('/', [HomeController::class, 'logout'])->name('logout.app');
Route::get('/dashboard', [AccountsController::class, 'dashboard'])->name('dashboard');

// administration routes
Route::group(['middleware' => 'can:admin.view'], function() {
    Route::get('/admin/users', [AccountsController::class, 'admin'])->name('admin.home');
    Route::get('/admin/users/{id}/edit', [AccountsController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/users/{id}', [AccountsController::class, 'update'])->name('admin.update');
    Route::delete('/admin/users/{id}', [AccountsController::class, 'destroy'])->name('admin.delete');
    Route::get('/admin/user/profile', [AccountsController::class, 'profile'])->name('admin.profile');
    Route::patch('/admin/user/store', [AccountsController::class, 'storeProfile'])->name('admin.profile.store');
    Route::get('/admin/user/update', [AccountsController::class, 'updateProfile'])->name('admin.profile.update');
// test routes
    Route::get('/admin/permissions', [AccountsController::class, 'permissions'])->name('admin.permissions');
    Route::get('/admin/transfer', [AccountsController::class, 'acl'])->name('admin.transfer'); //run once only
});



// Projects routes
Route::get('/projects', [ProjectsController::class ,'index'])->name('projects.home');
Route::get('/projects/assignment', [ProjectsController::class, 'assign'])->name('project.assign');
Route::get('/projects/assignment/{id}', [ProjectsController::class, 'assignment'])->name('project.assignment.users');
Route::patch('/projects/assignment/{id}/update', [ProjectsController::class, 'usersAssignment'])->name('projects.assign.update.users');
Route::get('/project/create', [ProjectsController::class, 'create'])->name('project.create');
Route::get('/project/{id}', [ProjectsController::class, 'show'])->name('project.show');
Route::delete('/project/{id}/destroy', [ProjectsController::class, 'destroy'])->name('project.destroy');
Route::post('/project', [ProjectsController::class, 'store'])->name('project.store');
Route::get('/project/{id}/edit', [ProjectsController::class, 'edit'])->name('project.edit');
Route::patch('/project/{id}', [ProjectsController::class, 'update'])->name('project.update');

// Task-board routes
Route::get('/project/task-board/{project}', [BoardController::class, 'index'])->name('taskboard');

// Issues routes
Route::get('/issues', [IssuesController::class, 'index'])->name('issues.home');
Route::get('/priority', [IssuesController::class, 'priority'])->name('issues.priority');
Route::get('/status', [IssuesController::class, 'status'])->name('issues.status');
Route::get('/issues/assigned', [IssuesController::class, 'assigned'])->name('issues.assigned');
Route::get('/issues/reported', [IssuesController::class, 'reported'])->name('issues.reported');
Route::get('/tickets/{id}', [IssuesController::class, 'issues'])->name('issues.project');
Route::get('/issue/create/{project_id}', [IssuesController::class, 'create'])->name('issue.create');
Route::get('/issue/{id}', [IssuesController::class, 'show'])->name('issue.show');
Route::post('/issue/{project_id}', [IssuesController::class, 'store'])->name('issue.store');
Route::get('/issue/{id}/edit', [IssuesController::class, 'edit'])->name('issue.edit');
Route::patch('/issue/{id}', [IssuesController::class, 'update'])->name('issue.update');

// Watch issues routes
Route::get('/watching', [WatchingController::class, 'index'])->name('watch.home');
Route::post('/watch/{id}', [WatchingController::class, 'store'])->name('watch.store');

