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

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/', 'PagesController@today')->name('pages.today');
    Route::get('/future','PagesController@future')->name('pages.future');
    Route::get('/history','PagesController@history')->name('pages.history');
    Route::get('/finished/{id}','PagesController@Finished')->name('pages.finished');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('task','TasksController')->except('index','show','create');

});






