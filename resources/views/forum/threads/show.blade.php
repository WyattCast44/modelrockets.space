@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('forum.index') }}">Forum</a> /
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
                <div class="rounded border-2 border-solid p-8 mb-4 border-blue-300 bg-white shadow-md relative">
                    <p class="absolute top-0 right-0 p-2 text-xs uppercase text-blue-600">Original Post</p>
                    
                    <h2 class="mb-2 font-semibold text-lg text-blue-900">{{ $thread->title }} </h2>
                    <div class="markdown-body">
                        {!!  $thread->body !!}
                    </div>

                    @if($thread->attachments)
                        <div class="mt-5">
                            @foreach ($thread->attachments as $attachment)  
                                <a href="{{ $attachment->url }}" class="cursor-pointer hover:no-underline">
                                    <img src="{{ $attachment->url }}" alt="Title" class="hover:shadow-lg inline mx-1 border border-solid border-gray-700 shadow-md w-12 h-12 rounded">    
                                </a>  
                            @endforeach
                        </div>
                    @endif
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
                        <div class="markdown-body">
                            {!! $reply->body !!}
                        </div>
                    </div>
                @empty
                    
                @endforelse

                <div class="mt-6">
                    {{ $replies->links() }}
                </div>                

            </div>

            <!-- Sidebar -->
            <div class="w-1/4 mb-4 h-12">
                <a href="{{ $thread->repliesPath() }}" class="btn btn-primary block mb-3">Add Reply</a>
                <a href="#" class="btn btn-outline-secondary block mb-3">Report</a>
            </div>

        </div>

        
</div>

@endsection