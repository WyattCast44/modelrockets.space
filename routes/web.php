<?php

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/forum', 'ForumController')->name('forum.index');
Route::get('/forum/{board}', 'BoardsController@show')->name('boards.show');
Route::get('/forum/{board}/threads/{thread}', 'ThreadsController@show')->name('threads.show');
Route::get('/forum/{board}/threads/{thread}/replies/new', 'RepliesController@create')->name('replies.create');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/users/@{user}', 'UsersController@update')->name('users.update');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
