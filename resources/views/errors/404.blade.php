@extends('layouts.app')

@section('page-title', '404... You have entered unknown space!')

@section('content')

<div class="relative">
    <div 
        class="absolute h-screen top-0 bottom-0 right-0 left-0 bg-purple-700 flex justify-center items-center"
        style="background-image: url({{ asset('404.jpg') }}); background-size:cover; background-position:center;"
    >

        <div>
            <h1 class="text-white text-center text-5xl bg-gray-800 p-4" style="opacity:.85;">
                404... You have entered unknown space!
            </h1>
        </div>

    </div>
</div>

@endsection