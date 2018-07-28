<?php

Route::get('/', 'PostController@index')->name('homepage');

// Redirect /home to root path used in Auth Middleware
Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();
Route::resource('/post','PostController', ['except' => ['index']]);
Route::post('/post/{id}/comment','CommentController@store')->where('id', '[0-9]+');
