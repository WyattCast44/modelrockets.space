@extends('layouts.app')

@section('content')

<header class="flex flex-col bg-gray-200 pt-8 md:pt-12 pb-6 md:pb-10">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">The Forums</h1>
        <p class="text-gray-700 text-lg">
                Share your knowledge. It’s a way to achieve immortality. - <span class="italic font-light">Dalai Lama</span>
        </p>
    </div>
</header>

<section class="border-b border-solid border-gray-300 bg-gray-200 py-4 md:py-6 sticky top-0 shadow-lg mb-4 sm:mb-6 md:mb-12" style="z-index:1000;">

    <div class="container md:shidden" style="max-width:90%">
        
        <div class="flex justify-between items-center">
            
            @include('forum._partials.filter-select')

            @include('forum._partials.boards-select')
            
            @include('forum._partials.search')

        </div>

    </div> 

</section>

    @yield('forum-page')
    
@endsection