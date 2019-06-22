<?php

use Spatie\Honeypot\ProtectAgainstSpam;

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController');

Route::get('/forum', 'ForumController')->name('forum.index');
Route::get('/forum/b/{board}', 'BoardsController@show')->name('boards.show');
Route::get('/forum/b/{board}/threads/create', 'ThreadsController@create')->name('threads.create');
Route::post('/forum/b/{board}/threads', 'ThreadsController@store')->name('threads.store');
Route::get('/forum/b/{board}/threads/{thread}', 'ThreadsController@show')->name('threads.show');
Route::get('/forum/b/{board}/threads/{thread}/replies/new', 'RepliesController@create')->name('replies.create');
Route::post('/forum/b/{board}/threads/{thread}/replies', 'RepliesController@store')->name('replies.store')->middleware(ProtectAgainstSpam::class);


Route::get('/members', 'UsersController@index')->name('users.index');
Route::get('/members/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/members/@{user}', 'UsersController@update')->name('users.update');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/roadmap', 'FeaturesController@index')->name('features.index');
Route::post('/roadmap/{feature}/upvote', 'FeatureUpvotesController')->name('features.upvote');

Route::get('/search', 'SearchController');
