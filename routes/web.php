<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::feeds('rss');

// Pages...
Route::get('/', 'DashboardController')->name('home');
Route::view('/pages/terms', 'pages.terms')->name('pages.terms');
Route::view('/pages/privacy', 'pages.privacy')->name('pages.privacy');

// Members...
Route::get('/members', 'UsersController@index')->name('users.index');
Route::get('/members/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/members/@{user}', 'UsersController@update')->name('users.update');
Route::get('/members/@{user}/flights', 'FlightsController@index')->name('flights.index');
Route::post('/members/@{user}/flights', 'FlightsController@store')->name('flights.store');
Route::get('/members/@{user}/flights/create', 'FlightsController@create')->name('flights.create');
Route::get('/members/@{user}/flights/{flight}', 'FlightsController@show')->name('flights.show');
Route::delete('/members/@{user}/flights/{flight}', 'FlightsController@delete')->name('flights.delete');

// Member Gallery
if (config('features.user-galleries')) {
    Route::get('/members/@{user}/gallery', 'UserGalleryController@index')->name('users.gallery.index');
}

// Articles...
Route::view('/articles', 'articles.index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/preview', 'ArticlesController@preview')->name('articles.preview');
Route::post('/articles/{article}/favorite', 'ArticleFavoritesController@store')->name('articles.favorite');
Route::post('/articles/{article}/unfavorite', 'ArticleFavoritesController@destroy')->name('articles.unfavorite');

// Roadmap...
Route::livewire('/roadmap', 'features.index')->name('features.index');

// Forum...
Route::get('/forum', 'ForumController')->name('forum.index');
Route::get('/forum/b/{board}', 'BoardsController@show')->name('boards.index.show');
Route::get('/forum/b/{board}/threads', 'BoardsController@show')->name('boards.show');
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

// Data...
Route::get('/data/motors', 'Data\MotorsController@index')->name('data.motors.index');
Route::get('/data/vendors', 'Data\VendorsController@index')->name('data.vendors.index');
Route::get('/data/motors/{motor}', 'Data\MotorsController@show')->name('data.motors.show');
Route::get('/data/motors/{motor}/edit', 'Data\MotorsController@edit')->name('data.motors.edit');

// Learn
Route::get('/learn', 'Learn\LearnCenterDashboardController')->name('learn.index');
Route::get('/learn/p/{playlist}', 'Learn\PlaylistsController@show')->name('learn.playlists.show');
Route::post('/learn/p/{playlist}/subscribe', 'Learn\PlaylistSubscriptionsController@store')->name('learn.playlists.subscriptions.store');
Route::delete('/learn/p/{playlist}/subscribe', 'Learn\PlaylistSubscriptionsController@destroy')->name('learn.playlists.subscriptions.delete');
Route::get('/learn/p/{playlist}/{video}', 'Learn\PlaylistVideosController@show')->name('learn.playlists.videos.show');

// Search
Route::get('/search', 'SearchController@show')->name('search.index');

// Bamboozled
Route::redirect('/.env', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/admin', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/wp-login', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/wp-admin', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/wordpress', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/phpmyadmin', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/wp-admin.php', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/wp-login.php', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
Route::redirect('/administrator', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 301);
