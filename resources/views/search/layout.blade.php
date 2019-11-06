@extends('layouts.app')

@section('page-title', 'Search')

@section('content')

    <header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-8 sm:py-10">
        <div class="container">
            <h1 class="font-semibold text-3xl mb-2 text-center">
                
                @if (request()->has('q'))
                    Search results for: <span class="italic font-medium bg-purple-200 px-2 leading-tight">{{ request()->query('q') }}</span>
                @else
                    Search the Site    
                @endif

            </h1>

            <form action="{{ route('search.index') }}" method="get" class="my-4">
                <div class="flex items-center">
                    <input type="text" name="q" class="form-control m-0 focus:shadow-lg hover:shadow-lg rounded-r-none" placeholder="Search... Press '/' to focus..." value="{{ old('q') }}" id="search-input">
                    <button type="submit" class="btn btn-outline-primary hover:shadow-lg rounded-l-none">Search</button>
                </div>
            </form>

        </div>
    </header>


    <div class="container my-16">

        @yield('search-page')

    </div>

    @push('scripts')
    
        <script>
            document.addEventListener('keydown', event => {
                var input = document.querySelector('#search-input');

                if (event.keyCode === 191 && document.activeElement != input) {
                    event.preventDefault();

                    input.focus();
                }
            });
        </script>

    @endpush

@endsection