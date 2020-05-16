@extends('layouts.app')

@section('page-title', '404... You have entered unknown space!')

@section('content')

<header class="flex flex-col py-8 bg-gray-200 border-b border-gray-300 border-solid sm:py-10">
    <div class="container">
        <h1 class="mb-2 text-3xl font-semibold text-center">
            
            404... You have entered unknown space!
            
        </h1>
    </div>
</header>


<div class="container my-16">

    <div class="flex items-center justify-center mt-10">
        @svg('404', 'h-64')
    </div>

</div>

@endsection