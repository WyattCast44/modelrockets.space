@extends('layouts.app')

@section('content')

    <header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

        <div class="container flex justify-between items-center">
            
            <div>
                <a href="{{ route('forum.index') }}" class="text-sm">Forum</a> /
                <h2 class="text-xl mb-0">{{ $board->name }}</h2>
            </div>

            <div>
                
                @if($board->allow_new_public_threads)
                    <a href="{{ route('threads.create', ['board' => $board]) }}" class="btn btn-outline-primary rounded mr-2 btn-sm">
                        📝 Create Thread
                    </a>
                @endif

                <a href="#share" class="btn btn-outline-primary rounded btn-sm">
                    📤 Share Board
                </a>

            </div>
            
        </div>
    
    </header>

    @yield('forum-page')

    @include('forum.boards._partials.share')
    
@endsection