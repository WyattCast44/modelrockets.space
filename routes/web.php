<?php

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/forum', 'ForumController')->name('forum.index');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/users/@{user}', 'UsersController@update')->name('users.update');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
