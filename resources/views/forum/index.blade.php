@extends('forum.layout')

@section('page-title', 'Forum')

@section('forum-page')

    <div class="container mb-10">

        <div class="relative flex items-center p-4 mb-5 space-x-2 bg-gray-100 border-2">

            <a href="{{ route('forum.threads.create') }}" class="flex-1">
                <input name="post" id="post" class="w-full py-1 mt-0 hover:border-blue-400 form-input bg-gray-50 hover:bg-white" placeholder="Create new post..." />
            </a>

            <a href="{{ route('forum.threads.create') }}" class="text-gray-500 hover:text-gray-600">
                @svg('image', 'w-8 h-8 font-light')
            </a>

        </div>

        <ul class="border border-solid divide-y">

            @foreach ($threads as $thread)
                @include('forum._partials.thread')  
            @endforeach

        </ul>

        <div class="flex items-center justify-between mt-5">
            {{ $threads->appends(request()->except('page'))->links() }}
        </div>

    </div>

@endsection