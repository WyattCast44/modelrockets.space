<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Articles\ArticleIndex;
use App\Http\Livewire\Features\FeatureIndex;

// Articles
Route::get('/articles', ArticleIndex::class)->name('articles.index');

// Roadmap...
Route::get('/roadmap', FeatureIndex::class)->name('features.index');
