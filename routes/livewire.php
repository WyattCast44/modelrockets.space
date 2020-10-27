<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\UserIndex;
use App\Http\Livewire\Articles\ArticleShow;
use App\Http\Livewire\Articles\ArticleIndex;
use App\Http\Livewire\Features\FeatureIndex;
use App\Http\Livewire\Threads\ThreadCreate;

// Users
Route::get('/members', UserIndex::class)->name('users.index');

// Articles
Route::get('/articles', ArticleIndex::class)->name('articles.index');
Route::get('/articles/{article}', ArticleShow::class)->name('articles.show');

// Roadmap
Route::get('/roadmap', FeatureIndex::class)->name('features.index');

// Forum
Route::get('/threads/create', ThreadCreate::class)->name('forum.threads.create');
