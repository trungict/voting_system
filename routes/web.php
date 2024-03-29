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
})->middleware('guest');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('submit-poll', 'CandidateController@submitPoll')->name('submit-poll');

    Route::middleware('admin')->group(function () {
        Route::resource('users', 'UserController');
        Route::resource('positions', 'PositionController');
        Route::resource('candidates', 'CandidateController');
        Route::get('poll-result', 'CandidateController@pollResult')->name('poll-result');
    });
});
