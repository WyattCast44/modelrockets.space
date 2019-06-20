@extends('layouts.app')

@section('page-title', $article->title)

@section('content')

<h1></h1>

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">

        <a href="{{ route('articles.index') }}" class="mb-2 inline-block text-sm">&leftarrow; Back to Articles</a>

        <h1 class="font-semibold text-4xl mb-3">{{ $article->title }}</h1>

        <p>{{ $article->subtitle }}</p>

    </div>
</header>

<div class="container mx-auto mt-5 mb-12">

    <div class="flex items-center mb-8 print:hidden">
        <div data-controller="print">
            <a href="#" class="btn btn-outline-primary mr-2 btn-sm" data-action="print#handle">🖨️ Print</a>
        </div>
        <a href="#share" class="btn btn-outline-primary btn-sm">📤 Share</a>
    </div>

    <div class="markdown-body">
        
        {!! $article->body !!}
        
    </div>

</div>

@include('articles._partials.share')

@endsection