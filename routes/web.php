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

Route::get('/', function() {
    return redirect(route('login'));
});
Route::get('/starter', function() {
    return view('starter');
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/usuarios', 'DashboardController@users')->name('users');
    Route::get('/perfil', 'DashboardController@profile')->name('profile');
    Route::get('/chat', 'DashboardController@chat')->name('chat');
    Route::get('/mensaje', 'DashboardController@messagechat')->name('messagechat');
});
