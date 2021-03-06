<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	// user resource routes
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

	//authenticated users profile route
	Route::get('/profile/show', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
	Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [App\Http\Controllers\ProfileController::class, 'password'])->name('profile.password');

	//panel lawyers route
	Route::get('/panel-lawyers',[App\Http\Controllers\PanelLawyerController::class,'index'])->name('panleLawyers.index');
	Route::get('/panel-lawyers/create',[App\Http\Controllers\PanelLawyerController::class,'create'])->name('panelLawyers.create');
	Route::post('/panel-lawyers/store',[App\Http\Controllers\PanelLawyerController::class,'store'])->name('panelLawyers.store');

	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
});

