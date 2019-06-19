@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
        </p>
    
        <h1 class="text-xl mb-0">
            {{ $thread->title }}
        </h1>
    </div>

</header>

<div class="container mb-12">

    <div class="flex mb-5">
        <a href="{{ $thread->path() }}">Back to thread</a>
    </div>

    <!-- Original Post -->
    <div class="rounded border-2 border-solid p-8 mb-4 border-blue-300 bg-blue-100 relative">
        <p class="absolute top-0 right-0 p-2 text-xs uppercase text-blue-600">Original Post</p>
        {{ $thread->body }}
    </div>

    <form action="{{ $thread->repliesPath('store') }}" method="post">

        @csrf
        @honeypot

        <div class="form-group">
            <label for="body">Your Reply</label>
            <textarea name="body" id="body" rows="10" class="form-control" placeholder="Your thoughts..."></textarea>
        </div>

        <div class="form-group flex justify-end">
            <a href="{{ $thread->path() }}" class="btn btn-link">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

@endsection