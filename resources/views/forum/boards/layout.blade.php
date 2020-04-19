@extends('layouts.app')

@section('content')

    <header class="sticky top-0 py-6 mb-8 bg-gray-200 border-b border-gray-300 border-solid shadow-md" style="z-index:1000">

        <div class="container flex items-center justify-between">
            
            <div>
                <a href="{{ route('forum.index') }}" class="text-sm">Forum</a> /
                <h2 class="mb-0 text-xl">{{ $board->name }}</h2>
            </div>

            <div>
                
                @if($board->allow_new_public_threads)
                    <a href="{{ route('threads.create', ['board' => $board]) }}" class="mr-2 rounded btn btn-outline-primary btn-sm">
                        📝<span class="hidden md:inline"> Create Thread</span>
                    </a>
                @endif

                <a href="#share" class="rounded btn btn-outline-primary btn-sm" data-turbolinks="false">
                    📤<span class="hidden md:inline"> Share Board</span>
                </a>

                <x-share title="Forum Board"></x-share>

            </div>
            
        </div>
    
    </header>

    @yield('forum-page')
    
@endsection