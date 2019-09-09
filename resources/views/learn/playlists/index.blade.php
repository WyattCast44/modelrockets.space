@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container flex">
        <div class="mr-8 w-3/4">
            <h1 class="font-semibold text-4xl mb-2">
                {{ $playlist->name }}
            </h1>
            <p class="text-gray-700 text-lg">
                {{ $playlist->description }}
            </p>    
            <div class="flex mt-5">
                <button class="rounded-full uppercase text-sm px-4 py-3 bg-gray-100 hover:bg-blue-100 hover:text-blue-500 hover:border-blue-500 border border-solid">
                    Subscribe to Series
                </button>
            </div>
        </div>
        <div class="flex items-center justify-end">
            <img src="{{ $playlist->imageUrl }}" alt="playlist cover image" class="rounded-lg h-48 w-48 shadow-lg">
        </div>
    </div>
</header>

<section class="container">

    <ul>

        @foreach ($playlist->videos as $video)
            
        <li class="block mb-2">
           {{ $video->name }} 
        </li>

        @endforeach

    </ul>

</section>


@endsection