@extends('layouts.app')

@section('content')

    <header class="border-b border-solid border-gray-300 bg-gray-200 py-4 md:py-6 sticky top-0 shadow-md mb-8" style="z-index:1000;">

        <div class="mx-auto flex justify-between items-center md:hidden" style="width:600px;max-width:90%">
            
            <div>

                <label for="" class="block uppercase mb-1 text-xs text-gray-500 text-center">Filters</label>
                <div class="relative">
                    <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>All</option>
                        <option>Popular</option>
                        <option>Newest</option>
                        <option>My Threads</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>

            </div>

            <div>
                <label for="" class="block uppercase mb-1 text-xs text-gray-500 text-center">Boards</label>
                <div class="relative">
                        <select class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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

    </header>

    @yield('forum-page')
    
@endsection