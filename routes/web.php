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
    return view('auth.login');
});

Auth::routes();



Route::group(['middleware'=>'is-ban'], function(){
    Route::post('/ban','UserController@ban');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/competition/list', 'CompetitionController@list')->name('competition.list');
    Route::get('/picture/list', 'CompetitionController@list')->name('picture.list');
    Route::resource('picture', 'PictureController');
    Route::resource('competition', 'CompetitionController');
    Route::resource('user', 'UserController');
    Route::post('/disq','PicCompController@destroy');
    Route::post('/del','CompetitionController@destroy');
    Route::put('/close','CompetitionController@update');
    Route::post('/delImage','PictureController@destroy');
    Route::post('/vote','VoteController@vote');
    Route::put('/edit', 'UserController@update');
});

