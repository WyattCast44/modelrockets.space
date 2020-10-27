@extends('layouts.app')

@section('content')

{{-- <section class="sticky top-0 py-4 mb-4 bg-gray-200 border-b border-gray-300 border-solid shadow-lg md:py-6 sm:mb-6 md:mb-12" style="z-index:1000;">

    <div class="container md:shidden" style="max-width:90%">
        
        <div class="flex items-center justify-between">
            
            {{-- @include('forum._partials.filter-select')

            @include('forum._partials.boards-select')
            
            @include('forum._partials.search') 

        </div>

    </div> 

</section> --}}

<div class="max-w-5xl mx-auto my-10">
    <div class="flex w-full space-x-4">
        <div class="w-10/12">@yield('forum-page')</div>
        <div class="w-2/12 bg-gray-200">Sidebar</div>
    </div>
</div>
    
@endsection