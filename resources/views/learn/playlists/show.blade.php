@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<div class="h-screen">

    <section class="bg-gray-800 flex flex-col md:flex-row justify-center items-top z-0 overflow-hidden" style="max-height: 650px;">

        <div class="flex-1 flex justify-center items-center vid-container p-4">
            {!! $mainVideo->embed_code !!}
        </div>
    
        <div class="w-1/5 bg-gray-900 p-4 flex-col">

            <h2 class="uppercase text-white font-semibold">{{ $playlist->name }}</h2>

            <!-- Prev/Next -->
            <div class="flex items-center justify-center my-4">
                <a href="#" class="block w-full text-white hover:bg-gray-700 hover:text-white shadow-inner hover:no-underline px-3 py-2 mr-1 text-center bg-gray-800 rounded-lg uppercase text-sm">Prev</a>
                <a href="#" class="block w-full text-white hover:bg-gray-700 hover:text-white shadow-inner hover:no-underline px-3 py-2 ml-1 text-center bg-gray-800 rounded-lg uppercase text-sm">Next</a>
            </div>

            <!-- Playlist videos -->
            <ul class="flex-1 list-unstyled border-solid border border-gray-800 max-w-full shadow-inner rounded-lg overflow-y-auto" style="max-height: 75%">
                @foreach ($playlist->videos as $video)
                    <li class="block hover:bg-gray-800 rounded-lg">
                        <a href="{{ route('learn.playlists.videos.show', ['playlist' => $playlist, 'video' => $video]) }}" class="p-4 block hover:no-underline hover:text-white text-white">
                            {{ $loop->iteration }}. {{ $video->name }}
                        </a>
                    </li>
                @endforeach                
            </ul>
        </div>
    
    </section>

    <div class="bg-gray-200 shadow-inner z-10">
        <div class="container py-6">
            name
        </div>
    </div>

</div>


<style>
    .vid-container > iframe {
        width: 100%;
        min-height: 575px;
    }
</style>

@endsection