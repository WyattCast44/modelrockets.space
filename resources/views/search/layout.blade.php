@extends('layouts.app')

@section('page-title', 'Search')

@section('content')

    <header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-8 sm:py-10">
        <div class="container">
            <h1 class="font-semibold text-3xl mb-2 text-center">Search the Site</h1>

            <form action="{{ route('search.index') }}" method="get" class="my-4">
                <div class="flex items-center">
                    <input type="text" name="q" id="q" class="form-control m-0 focus:shadow-lg hover:shadow-lg rounded-r-none" placeholder="Search... Press '/' to focus...">
                    <button type="submit" class="btn btn-outline-primary hover:shadow-lg rounded-l-none">Search</button>
                </div>
            </form>

        </div>
    </header>


    <div class="container">

        @yield('search-page')

    </div>

@endsection