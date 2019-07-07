@extends('forum.boards.layout')

@section('page-title', 'Forum: ' . $board->name)

@section('forum-page')

    <div class="container">
        @forelse ($threads as $thread)
            @include('forum._partials.thread')
        @empty        
        @endforelse
    </div>

@endsection