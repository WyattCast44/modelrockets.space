@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
        </p>
    
        <h1 class="text-xl mb-0">{{ $thread->title }}</h1>
    </div>

</header>

<div class="container mb-12">

        <div class="flex flex-wrap -mb-4">

            <!-- Main Content -->
            <div class="w-2/3 mb-4 mr-4">

                <!-- Original Post -->
                <div class="rounded border-2 border-solid p-8 mb-4 border-blue-300 bg-blue-100 relative">
                    <p class="absolute top-0 right-0 p-2 text-xs uppercase text-blue-600">Original Post</p>
                    {{ $thread->body }}
                </div>
                
                @if($bestReply && !request()->has('page'))
                    <div class="rounded border-2 border-solid bg-green-100 p-8 mb-4 border-green-300 relative">
                        <p class="absolute top-0 right-0 p-2 text-xs uppercase text-green-600 flex items-center">
                            Best Answer @svg('star', 'ml-1 inline-block')
                        </p>
                        {{ $bestReply->body }}
                    </div>
                @endif

                @forelse ($replies as $reply)
                    <div class="rounded border border-solid border-gray-300 bg-white p-8 mb-4">
                        {{ $reply->body }}
                    </div>
                @empty
                    
                @endforelse

                <div class="mt-6">
                    {{ $replies->links() }}
                </div>                

            </div>

            <!-- Sidebar -->
            <div class="w-1/4 mb-4 h-12">
                <div class="rounded border border-solid border-gray-300 bg-white p-8">
                    <p>Sidebar Stuff</p>
                </div>
            </div>

        </div>

        <a href="{{ $thread->repliesPath() }}" class="btn btn-primary">Add Reply</a>
</div>

@endsection