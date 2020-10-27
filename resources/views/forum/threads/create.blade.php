@extends('layouts.app')

@section('page-title', 'Create New Thread')

@section('content')

<header class="sticky top-0 py-6 mb-8 bg-gray-200 border-b border-gray-300 border-solid shadow-md" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('forum.index') }}">Forum</a> /
            <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
        </p>
    
        <h1 class="mb-0 text-xl">Create New Thread</h1>
    </div>

</header>

<div class="container mb-16">

    <div class="flex mb-5">
        <a href="{{ $board->path($board) }}">&leftarrow; Back to board</a>
    </div>

    <!-- Board Desc -->
    <div class="p-8 mb-6 bg-blue-100 border-2 border-blue-300 border-solid rounded">
        <h2 class="text-lg font-semibold text-blue-900">Your Posting In: <span class="font-normal underline">{{ $board->name }}</span></h2>

        <p class="my-2">{{ $board->description }}</p>

        <p>Please note, this is a <strong>{{ ($board->public) ? 'public' : 'private' }}</strong> board.</p>
    </div>

    <!-- Create Form -->
    @include('forum.threads._partials.create')
        
</div>

@endsection