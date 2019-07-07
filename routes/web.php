<?php
use Illuminate\Http\Request;
use App\Article;

Auth::routes();

Route::feeds('rss');

// Pages...
Route::get('/', 'DashboardController')->name('home');
Route::view('/pages/terms', 'pages.terms');
Route::view('/pages/privacy', 'pages.privacy');

// Members...
Route::get('/members', 'UsersController@index')->name('users.index');
Route::get('/members/@{user}', 'UsersController@show')->name('users.show');
Route::patch('/members/@{user}', 'UsersController@update')->name('users.update');
Route::get('/members/@{user}/flights', 'FlightsController@index')->name('flights.index');
Route::post('/members/@{user}/flights', 'FlightsController@store')->name('flights.store');
Route::get('/members/@{user}/flights/create', 'FlightsController@create')->name('flights.create');
Route::get('/members/@{user}/flights/{flight}', 'FlightsController@show')->name('flights.show');

// Articles...
Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/search', 'ArticlesSearchController')->name('articles.search');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::post('/articles/{article}/favorite', 'ArticleFavoritesController@store')->name('articles.favorite');
Route::post('/articles/{article}/unfavorite', 'ArticleFavoritesController@destroy')->name('articles.unfavorite');

// Roadmap...
Route::get('/roadmap', 'FeaturesController@index')->name('features.index');
Route::post('/roadmap/{feature}/upvote', 'FeatureUpvotesController')->name('features.upvote');

// Forum...
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

// Data...
Route::get('/data/vendors', 'Data\VendorsController@index')->name('data.vendors.index');
Route::get('/data/motors', 'Data\MotorsController@index')->name('data.motors.index');
Route::get('/data/motors/{motor}', 'Data\MotorsController@show')->name('data.motors.show');
