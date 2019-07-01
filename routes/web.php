<?php

Auth::routes();

Route::feeds('rss');

Route::get('/', 'DashboardController')->name('home');
Route::view('/pages/terms', 'pages.terms');
Route::view('/pages/privacy', 'pages.privacy');

Route::get('/members', 'UsersController@index')->name('users.index');
Route::get('/members/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/members/@{user}', 'UsersController@update')->name('users.update');
Route::get('/members/@{user}/flights', 'FlightsController@index')->name('flights.index');
Route::post('/members/@{user}/flights', 'FlightsController@store')->name('flights.store');
Route::get('/members/@{user}/flights/create', 'FlightsController@create')->name('flights.create');
Route::get('/members/@{user}/flights/{flight}', 'FlightsController@show')->name('flights.show');

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');

Route::get('/roadmap', 'FeaturesController@index')->name('features.index');
Route::post('/roadmap/{feature}/upvote', 'FeatureUpvotesController')->name('features.upvote');

Route::get('/forum', 'ForumController')->name('forum.index');
Route::get('/forum/b/{board}', 'BoardsController@show')->name('boards.show');
Route::post('/forum/b/{board}/threads', 'ThreadsController@store')->name('threads.store');
Route::get('/forum/b/{board}/threads/create', 'ThreadsController@create')->name('threads.create');
Route::get('/forum/b/{board}/threads/{thread}', 'ThreadsController@show')->name('threads.show');
Route::delete('/forum/b/{board}/threads/{thread}', 'ThreadsController@destroy')->name('threads.delete');
Route::post('/forum/b/{board}/threads/{thread}/replies', 'RepliesController@store')->name('replies.store');
Route::get('/forum/b/{board}/threads/{thread}/replies/new/{parent?}', 'RepliesController@create')->name('replies.create');
Route::post('/forum/b/{board}/threads/{thread}/lock', 'LockedThreadController@store')->name('threads.lock');
Route::delete('/forum/b/{board}/threads/{thread}/unlock', 'LockedThreadController@destroy')->name('threads.unlock');

Route::post('/forum/b/{board}/threads/{thread}/replies/{reply}/favorite', 'ReplyFavoritesController@store')->name('reply.favorites.store');
Route::delete('/forum/b/{board}/threads/{thread}/replies/{reply}/unfavorite', 'ReplyFavoritesController@destroy')->name('reply.favorites.destroy');
