<?php

use App\Http\Controllers\PagesController;

Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

Route::get('/posts', 'PostController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create')->name('createPost');
Route::get('/posts/{post}', 'PostController@show');
Route::put('/posts/{post}', 'PostController@update');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::delete('/posts/{post}', 'PostController@destroy');

// This single line can substitute all the requests to '/posts'
// Route::resource('posts', 'PostController');
