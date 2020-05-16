@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<header class="flex flex-col py-12 mb-8 bg-gray-200 border-b border-gray-300 border-solid">
    <div class="container flex">
        <div class="w-3/4 mr-8">
            <h1 class="mb-2 text-4xl font-semibold">
                {{ $playlist->name }}
            </h1>
            <p class="text-lg text-gray-700">
                {{ $playlist->description }}
            </p>    
            <div class="flex mt-5">

                @if (auth()->check() && !auth()->user()->isSubscribedTo($playlist))
                    <form action="{{ route('learn.playlists.subscriptions.store', $playlist) }}" method="post">
                        @csrf
                        <button type="submit" class="px-4 py-3 text-sm uppercase bg-gray-100 border border-solid rounded-full hover:bg-blue-100 hover:text-blue-500 hover:border-blue-500">
                            Subscribe to Series
                        </button>
                    </form>    
                @else
                    <form action="{{ route('learn.playlists.subscriptions.delete', $playlist) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="px-4 py-3 text-sm uppercase bg-gray-100 border border-solid rounded-full hover:bg-blue-100 hover:text-blue-500 hover:border-blue-500">
                            Unsubscribe from Series
                        </button>
                    </form>   
                @endif

                
            </div>
        </div>
        <div class="flex items-center justify-end object-cover">
            <img src="{{ $playlist->imageUrl }}" alt="playlist cover image" class="h-48 rounded-lg shadow-lg">
        </div>
    </div>
</header>

<section class="container">

    <ul>

        @foreach ($playlist->videos as $video)
            
        <li class="block mb-2">
           <a href="{{ route('learn.playlists.videos.show', ['playlist' => $playlist, 'video' => $video]) }}">{{ $video->name }} </a>
        </li>

        @endforeach

    </ul>

</section>


@endsection