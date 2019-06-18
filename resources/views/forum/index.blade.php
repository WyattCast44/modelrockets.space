@extends('forum.layout')

@section('page-title', 'Forum')

@section('forum-page')

    <div class="container">

        <div class="mb-12">
            <h1 class="text-bold text-gray-600 mb-5 pb-1 border-b border-solid border-gray-400 text-3xl font-serif">
                All Boards
            </h1>

            <ul>
                @forelse ($boards as $board)
                
                    <li class="p-3 bg-white border border-solid border-gray-300 mb-3">
                        <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a>
                    </li>
        
                @empty            
                @endforelse        
            </ul>
        </div>

        <div class="mb-12">
                <h1 class="text-bold text-gray-600 mb-5 pb-1 border-b border-solid border-gray-400 text-3xl font-serif">
                    Newest Threads
                </h1>
    
                <ul>
                    @forelse ($latestThreads as $thread)
                    
                        <li class="p-3 bg-white border border-solid border-gray-300 mb-3">

                            <h2 class="font-semibold mb-3">
                                <a href="{{ route('boards.show', $thread->board) }}">
                                    {{ $thread->board->name }}
                                </a>
                                <span class="text-blue-400">/</span>
                                <a href="{{  $thread->path() }}">
                                    {{ $thread->title }}
                                </a>
                            </h2>
                            <p class="text-sm text-gray-600">
                                Posted by 
                                <a href="{{ route('users.show', $thread->user) }}">
                                    {{ '@' . $thread->user->username }}
                                </a>
                                {{ $thread->created_at->diffForHumans() }}
                            </p>
                            
                        </li>
            
                    @empty            
                    @endforelse        
                </ul>
            </div>

    </div>

@endsection