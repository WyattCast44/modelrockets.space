@extends('layouts.app')

@section('page-title', $article->title)

@section('content')

<h1></h1>

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-8 sm:py-10 md:py-12">
    <div class="container">

        <a href="{{ route('articles.index') }}" class="mb-2 inline-block text-sm print:hidden">&leftarrow; Back to Articles</a>

        <h1 class="font-semibold text-2xl sm:text-3xl md:text-4xl mb-3">{{ $article->title }}</h1>

        <p class="m-0">{{ $article->subtitle }}</p>

    </div>
</header>

<div class="container mx-auto mt-5 mb-12">

    <div class="flex items-center mb-4 sm:mb-6 md:mb-8 justify-center md:justify-start print:hidden">
        <div data-controller="print">
            <a href="#" class="btn btn-outline-primary mr-2 btn-sm" data-action="print#handle" data-turbolinks="false">🖨️ Print</a>
        </div>
        <a href="#share" class="btn btn-outline-primary btn-sm mr-2" data-turbolinks="false">📤 Share</a>
        <a href="{{ $article->thread->path($article->thread) }}" class="btn btn-outline-primary btn-sm" data-turbolinks="false">️️️️️️🗣️ Discuss</a>
    </div>

    <p class="text-sm text-gray-500 my-1 md:mb-8 text-center md:text-left">
            {{ ($article->hasBeenUpdated()) ? 'Posted ' : 'Updated ' }}
            {{ $article->updated_at->diffForHumans() }} 
            by
            <a href="{{ route('users.show', $article->user) }}">
                {{ '@' . $article->user->username }}
            </a>
        </p>

    <div class="markdown-body">
        
        {!! $article->body !!}
        
    </div>

</div>

@include('articles._partials.share')

@endsection