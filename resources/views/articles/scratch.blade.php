@extends('layouts.app') 

@section('page-title', 'Articles') 

@section('content')

    <header class="flex flex-col py-8 mb-8 bg-gray-200 border-b border-gray-300 border-solid sm:py-10 md:py-12">
        <div class="container">
            <h1 class="mb-2 text-4xl text-center">Articles</h1>

            <p class="text-center text-gray-600">
                Articles are long form posts about a specific topic. Have an idea for an article, let me know <a href="https://forms.gle/nMeDbABv64V7BUWo9" target="_blank">here</a>!
            </p>
        </div>
    </header>

    <div class="container mx-auto my-6 sm:my-10 md:my-12">

        <div class="mb-8">
            <form action="{{ route('articles.search') }}" method="get" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="q" id="q" class="m-0 rounded-r-none form-control focus:shadow-lg hover:shadow-lg" placeholder="Search articles...">
                    <button type="submit" class="rounded-l-none btn btn-outline-primary hover:shadow-lg">Search</button>
                </div>
            </form>
        </div>

        <ul class="mb-10">

            @foreach ($articles as $article)
                    
                <li class="flex p-6 my-3 bg-white border border-gray-400 border-solid rounded hover:bg-gray-200 hover:shadow-md">
                    
                    <div>
                        <!-- Title -->
                        <h2 class="text-lg font-semibold sm:text-xl">
                            <a href="{{ $article->path('show') }}">{{ $article->title }}</a>
                        </h2>

                        <!-- Subtitle -->
                        <p class="my-2 text-gray-700">
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

            @endforeach
            
        </ul>

        {{ $articles->links() }}

    </div>

@endsection
