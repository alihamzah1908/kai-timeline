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
    Route::get('/roles', 'Auth\RoleController@index')->name('roles.index');
    Route::get('/roles/create', 'Auth\RoleController@create')->name('roles.create');
    Route::get('/roles/{id}', 'Auth\RoleController@show')->name('roles.show');
    Route::post('/roles/store', 'Auth\RoleController@store')->name('roles.store');
    

    // TIMELINE
    Route::get('/data/timeline', 'TimelineController@data')->name('data.timeline');
    Route::get('/data/timeline/approve', 'TimelineController@approve')->name('timeline.approve');
    Route::get('/data/timeline/reject', 'TimelineController@reject')->name('timeline.reject');
    Route::post('/data/timeline/store', 'TimelineController@store')->name('timeline.store');
    
    // SP3
    Route::get('/data/sp-3', 'Sp3Controller@data')->name('data.sp3');
    Route::get('/data/sp-3/approve', 'Sp3Controller@approve')->name('sp3.approve');
    Route::get('/data/sp-3/reject', 'Sp3Controller@reject')->name('sp3.reject');
    Route::post('/data/sp-3/store', 'Sp3Controller@store')->name('sp3.store');
    Route::post('/data/sp-3/evaluasi/store', 'Sp3Controller@evaluasi_store')->name('evaluasi.store');

    //DASHBOARD
    Route::get('/dashboard/monitoring-rup', function () {
        return view('dashboard.monitoring-rup.index');
    })->name('monitoring.rup');
    Route::get('/dashboard/monitoring-realisasi', function () {
        return view('dashboard.monitoring-realisasi.index');
    })->name('monitoring.realisasi');
    Route::get('/dashboard/monitoring-pbj', function () {
        return view('dashboard.monitoring-pbj.index');
    })->name('monitoring.pbj');
    Route::get('/dashboard/monitoring-klaring', function () {
        return view('dashboard.monitoring-klaring.index');
    })->name('monitoring.klaring');
    Route::get('/dashboard/monitoring-rab', function () {
        return view('dashboard.monitoring-rab.index');
    })->name('monitoring.rab');
    Route::get('/dashboard/monitoring-vendor', function () {
        return view('dashboard.monitoring-vendor.index');
    })->name('monitoring.vendor');
    Route::get('/dashboard/monitoring-program', function () {
        return view('dashboard.monitoring-program.index');
    })->name('monitoring.program');
    Route::get('/dashboard/monitoring-warehouse', function () {
        return view('dashboard.monitoring-warehouse.index');
    })->name('monitoring.warehouse');
    
    //MENU-TRX
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
    Route::get('/sp-3/evaluasi/detail', function () {
        return view('sp-3.evaluasi.sp');
    })->name('evaluasi.sp3');
});
