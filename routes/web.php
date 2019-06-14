<?php

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/users/@{user}', 'UserController@show')->name('users.show');
