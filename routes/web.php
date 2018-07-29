<?php

Route::get('/', 'PostController@index')->name('homepage');

// Redirect /home to root path used in Auth Middleware
Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();
Route::resource('/post','PostController', ['except' => ['index']]);
Route::get('/post/{postId}/add-comment','CommentController@create')->where('postId', '[0-9]+')->name('comment.create');
Route::post('/post/{postId}/submit-comment','CommentController@store')->where('postId', '[0-9]+')->name('comment.store');
Route::get('/feed', 'PostFeedController@index');
