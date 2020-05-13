@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="sticky top-0 py-6 mb-8 bg-gray-200 border-b border-gray-300 border-solid shadow-md" style="z-index:1000">

    <div class="container flex items-center justify-between">
        
        <div>
            <p class="text-sm text-gray-700">
                <a href="{{ route('forum.index') }}">Forum</a> /
                <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
            </p>
            <h1 class="mb-0 text-lg md:text-xl">{{ $thread->title }}</h1>
        </div>

        <div class="flex flex-wrap items-center justify-end">
            
            @if($thread->open)
                <a href="{{ $thread->repliesPath() }}" class="mr-2 rounded btn btn-outline-primary btn-sm">
                    🗣️<span class="hidden md:inline"> Reply</span>
                </a>
            @endif

            <a href="#share" class="mr-2 rounded btn btn-outline-primary btn-sm" data-turbolinks="false">
                📤<span class="hidden md:inline"> Share Thread</span>
            </a>

        </div>
        
    </div>

</header>

<div class="container mb-12">

        <div>

            <!-- Original Post -->
            <div class="relative mb-4 bg-white border-2 border-blue-300 border-solid rounded shadow-md">
                
                <div class="p-8">
                    <p class="absolute top-0 right-0 p-2 text-xs text-blue-600 uppercase">Original Post</p>
                
                    <h2 class="mb-2 text-lg font-semibold text-blue-900">{{ $thread->title }} </h2>
                    <div class="markdown-body">
                        {!!  $thread->body !!}
                    </div>

                    @if($thread->attachments->count() <> 0)
                        <!-- Attachments -->
                        <div class="mt-5">
                            @foreach ($thread->attachments as $attachment)  
                                <a href="{{ $attachment->url_raw }}" class="cursor-pointer hover:no-underline">
                                    <img src="{{ $attachment->url_thumbnail }}" alt="Title" class="inline w-12 h-12 mx-1 border border-gray-700 border-solid rounded shadow-md hover:shadow-xl hover:border-blue-700">    
                                </a>  
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end p-2 bg-gray-200 border-gray-300 border-solid border-top">

                    @if(auth()->check() && $thread->user->id == auth()->id())
                        
                        <!-- Manage Thread -->
                        <div class="flex items-center justify-end mb-0">
                            <a href="#manage" class="btn btn-sm btn-outline-primary" data-turbolinks="false">⚙️<span class="hidden md:inline"> Manage Thread</span></a>        
                        </div>
                        
                    @else

                        <!-- Favorite Thread -->
                        <div class="flex items-center justify-end mb-0 mr-2">
                            <a href="#favorite" class="btn btn-sm btn-outline-primary" data-turbolinks="false">🔥<span class="hidden md:inline"> Favorite Thread</span></a>        
                        </div>

                        <!-- Report Thread -->
                        <div class="flex items-center justify-end mb-0">
                            <a href="#report" class="btn btn-sm btn-outline-primary" data-turbolinks="false">👀<span class="hidden md:inline"> Report Thread</span></a>        
                        </div>

                    @endif
                    
                </div>

            </div>

            <!-- Best Reply -->
            @if($bestReply && !request()->has('page'))
                <div class="relative p-8 mb-4 bg-green-100 border-2 border-green-300 border-solid rounded">
                    <p class="absolute top-0 right-0 flex items-center p-2 text-xs text-green-600 uppercase">
                        Best Answer @svg('star', 'ml-1 inline-block')
                    </p>
                    {{ $bestReply->body }}
                </div>
            @endif

            <!-- Replies -->
            @forelse ($replies as $reply)

                <div class="mb-4 bg-gray-100 border border-gray-300 border-solid rounded hover:border-gray-500 hover:shadow-md">

                    <!-- Main -->
                    <div class="flex px-8 pt-8 pb-6">
                        
                        <!-- Reply Author -->
                        <div class="flex items-start justify-around mr-4">
                            <img src="{{ $reply->user->gravatar }}" alt="" class="w-12 rounded-full">
                        </div>

                        <!-- Reply Content -->
                        <div>
                            <p class="mb-3 font-semibold leading-none text-gray-500">
                                <a href="{{ $reply->user->path('show') }}">{{ $reply->user->username }}</a> said...
                            </p>
                            <div class="markdown-body">
                                {!! $reply->body !!}
                            </div>
        
                            @if($reply->attachments->count() <> 0)
                                <div class="mt-5">
                                    @foreach ($reply->attachments as $attachment)  
                                        <a href="{{ $attachment->url_raw }}" class="cursor-pointer hover:no-underline">
                                            <img src="{{ $attachment->url_thumbnail }}" alt="Title" class="inline w-12 h-12 mx-1 mb-2 border border-gray-700 border-solid rounded shadow-md hover:shadow-lg">    
                                        </a>  
                                    @endforeach
                                </div>
                            @endif
                        </div>

                    </div>
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-end p-2 bg-gray-200 border-gray-300 border-solid border-top">

                        @if(auth()->check() && $reply->user->id == auth()->id())
                            
                            <!-- Manage Reply -->
                            <div class="flex items-center justify-end mb-0">
                                <a href="#delete" class="btn btn-sm btn-outline-primary" data-turbolinks="false">🗑️ <span class="hidden md:inline"> Delete</span></a>        
                            </div>
                            
                        @else
    
                            <!-- Favorite Thread -->
                            <div class="flex items-center justify-end mb-0 mr-2">
                                <a href="#favorite" class="btn btn-sm btn-outline-primary" data-turbolinks="false">🔥<span class="hidden md:inline"> Favorite</span></a>        
                            </div>

                            @if($thread->open)
                                <a href="{{ $thread->repliesPath('create', $reply->id) }}" class="btn btn-sm btn-outline-primary">
                                    🗣️ Reply
                                </a>
                            @endif
    
                        @endif
                        
                    </div>

                </div>

            @empty
                
            @endforelse

            <div class="mt-6">
                {{ $replies->links() }}
            </div>                

        </div>
        
</div>

@if(auth()->check() && $thread->user->id == auth()->id())
    @include('forum.threads._partials.manage')
@endif

<x-share title="Thread"></x-share>

@endsection