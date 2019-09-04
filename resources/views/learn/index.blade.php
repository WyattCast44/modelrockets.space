@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Learning Center</h1>
        <p class="text-gray-700">
            Greetings fellow rocketeers! Welcome to the learning center, a place for begineers and 
            seasoned flyers alike. The lessons are generally created by <a href="#">me</a> and reflect
            what I am learning at the moment. But if you have any suggestion on what you'd like to see, 
            please let me know <a href="#">here</a>. In the meantime, enjoy and I hope you learn something
            useful.
        </p>    
    </div>
</header>

<!-- Featured -->
<section class="container">

    <h2 class="text-xl font-semibold mb-4">Featured Playlists</h2>

    <div class="flex flex-wrap max-w-full items-center justify-between mx-3">

        @foreach($featuredPlaylists as $playlist)

            <div class="w-1/3 -mx-3 rounded-lg bg-gray-200 hover:shadow-lg p-4 hover:bg-gray-300 flex-col flex self-stretch justify-between">
                
                <div>
                    <!-- Cover image -->
                    <a href="{{ $playlist->path('show') }}" data-turbolinks="false">
                        <img src="{{ $playlist->image_url  }}" alt="Playlist cover image" class="max-w-full mb-3 rounded">
                    </a>

                    <!-- Name -->
                    <a href="{{ $playlist->path('show')  }}" class="text-gray-700 hover:text-gray-800 text-lg font-medium">{{ $playlist->name }}</a>    
                </div>

                <div class="flex items-center justify-between mt-3 align-bottom">
                    <span class="font-light text-gray-700 text-xs">{{ $playlist->videos->count() }} videos &middot; 32 mins</span>
                    <a href="{{ $playlist->path('show') }}" class="btn btn-sm btn-outline-primary">Check it out</a>
                </div>
            </div>

        @endforeach

    </div>

</section>

<!-- Email Capture -->

@endsection