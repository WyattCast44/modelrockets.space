<?php

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/@{user}', 'UsersController@show')->name('users.show');
