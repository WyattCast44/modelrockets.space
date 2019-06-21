@extends('layouts.app')

@section('page-title', 'Create New Thread')

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('forum.index') }}">Forum</a> /
            <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
        </p>
    
        <h1 class="text-xl mb-0">Create New Thread</h1>
    </div>

</header>

<div class="container mb-12">

    <div class="flex mb-5">
        <a href="{{ $board->path($board) }}">&leftarrow; Back to board</a>
    </div>

    <!-- Board Desc -->
    <div class="rounded border-2 border-solid p-8 mb-6 border-blue-300 bg-blue-100">
        <h2 class="font-semibold text-lg text-blue-900">Your Posting In: <span class="font-normal underline">{{ $board->name }}</span></h2>

        <p class="my-2">{{ $board->description }}</p>

        <p>Please note, this is a <strong>{{ ($board->public) ? 'public' : 'private' }}</strong> board.</p>
    </div>

    <!-- Create Form -->
    <form action="{{ route('threads.store', ['board' => $board]) }}" method="post">

        @csrf
        @honeypot

        <div class="form-group">
            <label for="title" class="text-lg text-gray-600">Title</label>
            <input name="title" id="title" class="form-control" placeholder="Your title..." required/>
        </div>

        <div class="form-group">
            <label for="body" class="text-lg text-gray-600">Body</label>
            <textarea name="body" id="body" rows="10" class="form-control" placeholder="Your thoughts, ideas, etc..." required></textarea>
        </div>

        <div class="form-group flex justify-end">
            <a href="{{ $board->path($board) }}" class="btn btn-link">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
        
</div>

@endsection