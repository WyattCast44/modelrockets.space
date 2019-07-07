@extends('layouts.app') 

@section('page-title', 'Articles Search Results For: ' . request('q')) 

@section('content')

    <header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-8 sm:py-10 md:py-12">
        <div class="container">
            <h1 class="font-semibold text-3xl mb-2 text-center">Article Search Results</h1>

            <p class="text-gray-600 text-center">
                You searched for: "{{ request('q') }}"
            </p>
        </div>
    </header>

    <div class="container mx-auto my-6 sm:my-10 md:my-12">

        <div class="mb-8">
            <form action="{{ route('articles.search') }}" method="get" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="q" id="q" class="form-control m-0 focus:shadow-lg hover:shadow-lg rounded-r-none" placeholder="Search articles...">
                    <button type="submit" class="btn btn-outline-primary hover:shadow-lg rounded-l-none">Search</button>
                </div>
            </form>
        </div>

        <ul class="mb-10">

            @forelse ($articles as $article)
                    
                <li class="flex my-3 p-6 bg-white rounded border border-solid border-gray-300 hover:bg-grey-200 hover:shadow-md">
                    
                    <div>
                        <!-- Title -->
                        <h2 class="font-semibold text-lg sm:text-xl">
                            <a href="{{ $article->path('show') }}">{{ $article->title }}</a>
                        </h2>

                        <!-- Subtitle -->
                        <p class="text-gray-700 my-2">
                            {{ $article->subtitle }}
                        </p>

                        <!-- Meta -->
                        <p class="text-sm text-gray-600">
                            {{  $article->published_at->diffForHumans() }}
                            &middot; by
                            <a href="{{  route('users.show', $article->user) }}">
                                {{ "@{$article->user->username}" }}
                            </a>
                        </p>

                    </div>
                </li>
            
            @empty
            
            <li class="text-center text-gray-600">
                No Results Found...
            </li>
            
            @endforelse
            
        </ul>

        {{ $articles->links() }}

    </div>

@endsection
