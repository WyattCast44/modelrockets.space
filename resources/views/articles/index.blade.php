@extends('layouts.app') 

@section('page-title', 'Articles') 

@section('content')

    <header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
        <div class="container">
            <h1 class="font-semibold text-3xl mb-5">Articles</h1>

            <input type="text" name="filter" placeholder="Search..." class="px-3 py-2 border-solid border border-gray-300 rounded focus:outline-none focus:shadow-outline" />
        </div>
    </header>

    <div class="container mx-auto my-12">

        <ul class="mb-10">

            @foreach ($articles as $article)
                    
                <li class="flex my-3 p-6 bg-white rounded border border-solid border-gray-300 hover:bg-grey-200 hover:shadow-md">
                    
                    <div>
                        <!-- Title -->
                        <h2 class="font-semibold text-xl">
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
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

            @endforeach
            
        </ul>

        {{ $articles->links() }}

    </div>

@endsection
