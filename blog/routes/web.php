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
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/home','HomeController@index')->name('home');
    Route::get('/about', 'PagesController@about')->name('about');
    Route::get('/posts', 'PagesController@posts')->name('posts');
    Route::get('/dashboard', 'PagesController@dashboard')->name('dashboard');
    Route::resource('post','PostController')->except(['index']);
});



