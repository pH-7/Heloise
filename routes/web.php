<?php

Route::get('/', 'PostController@index')->name('homepage');
Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();
Route::resource('/post','PostController', ['except' => ['index']]);
Route::post('/{id}/comment','CommentController@store')->where('id', '[0-9]+');
