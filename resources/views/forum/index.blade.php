@extends('forum.layout')

@section('page-title', 'Forum')

@section('forum-page')

    <h1>The Forum</h1>

    <ul>
        @forelse ($boards as $board)
        
            <li>
                <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a>
            </li>

        @empty            
        @endforelse        
    </ul>

@endsection