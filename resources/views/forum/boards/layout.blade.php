@extends('layouts.app')

@section('content')

    <header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

        <div class="container flex justify-between items-center">
            
            <div>
                <input type="text" class="form-control" placeholder="Search the forum...">
            </div>

            @if($board->allow_new_public_threads)
                <a href="{{ route('threads.create', ['board' => $board]) }}" class="btn btn-outline-primary rounded">
                    Create Thread
                </a>
            @endif
            
        </div>
    
    </header>

    @yield('forum-page')
    
@endsection