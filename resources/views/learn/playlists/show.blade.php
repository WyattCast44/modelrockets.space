@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<div class="h-screen">

    <section class="z-0 flex flex-col justify-center overflow-hidden bg-gray-800 md:flex-row items-top" style="max-height: 650px;">

        <div class="flex items-center justify-center flex-1 p-4 vid-container">
            {!! $mainVideo->embed_code !!}
        </div>
    
        <div class="flex-col w-1/5 p-4 bg-gray-900">

            <h2 class="mb-3 font-semibold text-white uppercase">{{ $playlist->name }}</h2>

            <!-- Prev/Next -->
            <div class="flex items-center justify-center my-4">
                <a href="#" class="block w-full px-3 py-2 mr-1 text-sm text-center text-white uppercase bg-gray-800 rounded-lg shadow-inner hover:bg-gray-700 hover:text-white hover:no-underline">Prev</a>
                <a href="#" class="block w-full px-3 py-2 ml-1 text-sm text-center text-white uppercase bg-gray-800 rounded-lg shadow-inner hover:bg-gray-700 hover:text-white hover:no-underline">Next</a>
            </div>

            <!-- Playlist videos -->
            <ul class="flex-1 max-w-full overflow-y-auto border border-gray-800 border-solid rounded-lg shadow-inner list-unstyled" style="max-height: 75%">
                @foreach ($playlist->videos as $video)
                    <li class="block rounded-lg hover:bg-gray-800">
                        <a href="{{ route('learn.playlists.videos.show', ['playlist' => $playlist, 'video' => $video]) }}" class="block p-4 text-white hover:no-underline hover:text-white">
                            {{ $loop->iteration }}. {{ $video->name }}
                        </a>
                    </li>
                @endforeach                
            </ul>
        </div>
    
    </section>

    <div class="z-10 bg-gray-200 shadow-inner">
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