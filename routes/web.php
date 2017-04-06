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

Route::get('/', 'PostController@index');

Auth::routes();

Route::resource('posts', 'PostController');
Route::resource('profile', 'ProfileController');
Route::resource('comments', 'CommentController');
Route::post('comments/{post}', 'CommentController@store')->name('comments.store');


