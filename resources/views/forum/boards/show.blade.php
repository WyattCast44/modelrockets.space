@extends('forum.boards.layout')

@section('page-title', 'Forum: ' . $board->name)

@section('forum-page')

    <div class="container">
        @forelse ($threads as $thread)
            <h2>
                <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
            </h2>    
        @empty        
        @endforelse
    </div>

@endsection