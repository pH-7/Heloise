<?php

Route::get('/', 'PostController@index')->name('homepage');
Route::view('/add','post.add')->middleware('auth');
Auth::routes();
Route::get('/{post}','PostController@show');
Route::post('/{post}/comment','CommentController@add');
Route::post('/add','PostController@add');
Route::get('/edit','PostController@edit')->name('post.edit');
Route::post('/update/{id}','PostController@update');
Route::post('/delete/{id}','PostController@delete')->name('post.delete');
