@extends('layouts.app')

@section('page-title', $article->title)

@section('content')

<h1></h1>

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">

    <h1 class="font-semibold text-4xl mb-3">{{ $article->title }}</h1>

    <p>{{ $article->subtitle }}</p>

    </div>
</header>

<div class="container mx-auto mt-5 mb-12">

    <div class="markdown-body">
        {!! $article->body !!}
    </div>
    
</div>

@endsection