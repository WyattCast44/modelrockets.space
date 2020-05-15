@extends('layouts.app')

@section('page-title', 'Search')

@section('content')

    <header class="flex flex-col py-8 bg-gray-200 border-b border-gray-300 border-solid sm:py-10">
        <div class="container">
            <h1 class="mb-2 text-3xl font-semibold text-center">
                
                @if (request()->has('q'))
                    Search results for: <span class="px-2 italic font-medium leading-tight bg-purple-200">{{ request()->query('q') }}</span>
                @else
                    Search the Site    
                @endif

            </h1>

            <form action="{{ route('search.index') }}" method="get" class="my-4">
                <div class="flex items-center">
                    <input type="text" name="q" class="m-0 rounded-r-none form-control focus:shadow-lg hover:shadow-lg" placeholder="Search... Press '/' to focus..." value="{{ old('q') }}" id="search-input" autofocus>
                    <button type="submit" class="rounded-l-none btn btn-outline-primary hover:shadow-lg">Search</button>
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