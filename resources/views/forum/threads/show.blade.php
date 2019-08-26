@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container flex justify-between items-center">
        
        <div>
            <p class="text-sm text-gray-700">
                <a href="{{ route('forum.index') }}">Forum</a> /
                <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
            </p>
            <h1 class="text-lg md:text-xl mb-0">{{ $thread->title }}</h1>
        </div>

        <div class="flex flex-wrap justify-end items-center">
            
            @if($thread->open)
                <a href="{{ $thread->repliesPath() }}" class="btn btn-outline-primary rounded mr-2 btn-sm">
                    🗣️<span class="hidden md:inline"> Reply</span>
                </a>
            @endif

            <a href="#share" class="btn btn-outline-primary rounded btn-sm mr-2" data-turbolinks="false">
                📤<span class="hidden md:inline"> Share Thread</span>
            </a>

        </div>
        
    </div>

</header>

<div class="container mb-12">

        <div>

            <!-- Original Post -->
            <div class="rounded border-2 border-solid mb-4 border-blue-300 bg-white shadow-md relative">
                
                <div class="p-8">
                    <p class="absolute top-0 right-0 p-2 text-xs uppercase text-blue-600">Original Post</p>
                
                    <h2 class="mb-2 font-semibold text-lg text-blue-900">{{ $thread->title }} </h2>
                    <div class="markdown-body">
                        {!!  $thread->body !!}
                    </div>

                    @if($thread->attachments->count() <> 0)
                        <!-- Attachments -->
                        <div class="mt-5">
                            @foreach ($thread->attachments as $attachment)  
                                <a href="{{ $attachment->url_raw }}" class="cursor-pointer hover:no-underline">
                                    <img src="{{ $attachment->url_thumbnail }}" alt="Title" class="hover:shadow-xl inline mx-1 border border-solid border-gray-700 shadow-md w-12 hover:border-blue-700 h-12 rounded">    
                                </a>  
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Actions -->
                <div class="bg-gray-200 p-2 border-top border-solid border-gray-300 flex justify-end items-center">

                    @if(auth()->check() && $thread->user->id == auth()->id())
                        
                        <!-- Manage Thread -->
                        <div class="mb-0 flex justify-end items-center">
                            <a href="#manage" class="btn btn-sm btn-outline-primary" data-turbolinks="false">⚙️<span class="hidden md:inline"> Manage Thread</span></a>        
                        </div>
                        
                    @else

                        <!-- Favorite Thread -->
                        <div class="mb-0 flex justify-end items-center mr-2">
                            <a href="#favorite" class="btn btn-sm btn-outline-primary" data-turbolinks="false">🔥<span class="hidden md:inline"> Favorite Thread</span></a>        
                        </div>

                        <!-- Report Thread -->
                        <div class="mb-0 flex justify-end items-center">
                            <a href="#report" class="btn btn-sm btn-outline-primary" data-turbolinks="false">👀<span class="hidden md:inline"> Report Thread</span></a>        
                        </div>

                    @endif
                    
                </div>

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
                <div class="rounded border border-solid hover:border-gray-500 border-gray-300 bg-gray-100 p-8 mb-4 hover:shadow-md">
                    <div class="markdown-body">
                        {!! $reply->body !!}
                    </div>

                    @if($reply->attachments->count() <> 0)
                        <div class="mt-5">
                            @foreach ($reply->attachments as $attachment)  
                                <a href="{{ $attachment->url_raw }}" class="cursor-pointer hover:no-underline">
                                    <img src="{{ $attachment->url_thumbnail }}" alt="Title" class="hover:shadow-lg inline mx-1 border border-solid border-gray-700 shadow-md w-12 h-12 rounded mb-2">    
                                </a>  
                            @endforeach
                        </div>
                    @endif

                    <div class="flex items-center mt-5">
                        <a href="#" class="btn btn-sm btn-outline-primary mr-2">👍 Favorite</a>

                        @if($thread->open)
                            <a href="{{ $thread->repliesPath('create', $reply->id) }}" class="btn btn-sm btn-outline-primary">🗣️ Reply</a>
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

@include('forum.threads._partials.share')

@endsection