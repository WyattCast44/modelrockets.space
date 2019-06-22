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

<nav class="border-b border-solid border-gray-300 bg-gray-200 py-4 md:py-6 sticky top-0 shadow-lg mb-4 sm:mb-6 md:mb-12" style="z-index:1000;">

    <div class="container mx-auto flex justify-between items-center md:shidden" style="max-width:90%">
        
        <!-- Filters -->
        <div>

            <label for="" class="leading-none block uppercase mb-1 text-xs text-gray-500 text-center">Filters</label>
            <div class="relative">
                <select data-controller="selectnav" data-target="selectnav.select" data-action="change->selectnav#handle" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option disabled selected>Select</option>
                    <option value="all">All</option>
                    <option value="popular">Popular</option>
                    <option value="latest">Newest</option>
                    <option value="mine">My Threads</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

        </div>

        <!-- Search -->
        <div class="flex-1 mx-3 hidden md:block">

                <label for="" class="leading-none block uppercase mb-1 text-xs text-gray-500 text-center">Search</label>
                <input type="text" class="my-0 w-full appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" placeholder="Search the forums...">

        </div>

        <!-- Boards -->
        <div class="ml-2 md:ml-0">
            <label for="" class="leading-none block uppercase mb-1 text-xs text-gray-500 text-center">Boards</label>
            <div class="relative">
                    <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option disabled selected>Select</option>
                        <option>General</option>
                        <option>Watering Hole</option>
                        <option>Low Power Rocketry</option>
                        <option>High Power Rocketry</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
        </div>

    </div> 

</nav>

    @yield('forum-page')
    
@endsection