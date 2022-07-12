<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
})->name('login');
Route::post('/process-login', 'Auth\AuthController@processLogin')->name('process.login');
Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('home');
    // USER
    Route::get('/users', 'Users\UserController@index')->name('users.index');
    Route::get('/users/create', 'Users\UserController@create')->name('users.create');
    Route::post('/users/store', 'Users\UserController@store')->name('users.store');
    
    // ROLES
    Route::get('/roles', 'Auth\RoleController@index')->middleware('role:admin')->name('roles.index');
    Route::get('/roles/create', 'Auth\RoleController@create')->name('roles.create');
    Route::get('/roles/{id}', 'Auth\RoleController@show')->name('roles.show');
    Route::post('/roles/store', 'Auth\RoleController@store')->name('roles.store');
    
    Route::get('/timeline/task-approval', function () {
        return view('timeline.task-approval.index');
    })->name('task.approval');
    Route::get('/timeline/list-timeline', function () {
        return view('timeline.list-timeline.index');
    })->name('list.timeline');
    Route::get('/sp-3/task-approval', function () {
        return view('sp-3.task-approval.index');
    })->name('sp3.task.approval');
    Route::get('/sp-3/list-sp-3', function () {
        return view('sp-3.list-sp3.index');
    })->name('list.sp3');
});
