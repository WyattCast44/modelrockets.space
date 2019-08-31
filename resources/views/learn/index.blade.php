@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<div class="h-screen">

    <section class="bg-gray-800 flex flex-col md:flex-row justify-center items-top">

        <div class="flex-1 flex justify-center items-center vid-container p-4">
            {!! $playlists->first()->videos->first()->embed_code !!}
        </div>
    
        <div class="w-1/5 bg-gray-900 p-4">
            <h2 class="uppercase text-white font-semibold">{{ $playlists->first()->name }}</h2>

            <div class="flex items-center justify-center my-4">
                <a href="#" class="block w-full text-white hover:bg-gray-700 hover:text-white shadow-inner hover:no-underline px-3 py-2 mr-1 text-center bg-gray-800 rounded-lg uppercase text-sm">Prev</a>
                <a href="#" class="block w-full text-white hover:bg-gray-700 hover:text-white shadow-inner hover:no-underline px-3 py-2 ml-1 text-center bg-gray-800 rounded-lg uppercase text-sm">Next</a>
            </div>
            <ul class="list-unstyled border-solid border border-gray-800 shadow-inner">
                <li class="p-4">Next</li>
                <li class="p-4">First</li>
            </ul>
        </div>
    
    </section>


    <div class="bg-gray-200 shadow-inner">
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