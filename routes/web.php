<?php

use Spatie\Honeypot\ProtectAgainstSpam;

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/forum', 'ForumController')->name('forum.index');
Route::get('/forum/{board}', 'BoardsController@show')->name('boards.show');
Route::get('/forum/{board}/threads/create', 'ThreadsController@create')->name('threads.create');
Route::post('/forum/{board}/threads', 'ThreadsController@store')->name('threads.store');
Route::get('/forum/{board}/threads/{thread}', 'ThreadsController@show')->name('threads.show');
Route::get('/forum/{board}/threads/{thread}/replies/new', 'RepliesController@create')->name('replies.create');
Route::post('/forum/{board}/threads/{thread}/replies', 'RepliesController@store')->name('replies.store')->middleware(ProtectAgainstSpam::class);


Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/users/@{user}', 'UsersController@update')->name('users.update');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/roadmap', 'FeaturesController@index')->name('features.index');
Route::post('/roadmap/{feature}/upvote', 'FeatureUpvotesController')->name('features.upvote');
