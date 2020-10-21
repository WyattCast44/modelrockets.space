<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UserIndex;
use App\Http\Livewire\Articles\ArticleShow;
use App\Http\Livewire\Articles\ArticleIndex;
use App\Http\Livewire\Features\FeatureIndex;

// Articles
Route::get('/articles', ArticleIndex::class)->name('articles.index');
Route::get('/articles/{article}', ArticleShow::class)->name('articles.show');

// Users
Route::get('/members', UserIndex::class)->name('users.index');

// Roadmap
Route::get('/roadmap', FeatureIndex::class)->name('features.index');
