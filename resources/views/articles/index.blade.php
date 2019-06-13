@extends('layouts.app') 

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">

        <h1 class="font-semibold text-3xl mb-3">Articles</h1>

    <input
        type="text"
        name="filter"
        placeholder="Search..."
        class="px-3 py-2 border-solid border border-gray-300 rounded focus:outline-none focus:shadow-outline"
    />

    </div>
</header>

<div class="container mx-auto my-12">

    <ul>
        @forelse ($articles as $article)

            <a href="{{ route('articles.show', $article) }}">

                <li class="flex my-3 p-3 py-4 bg-white rounded border border-solid border-gray-300 hover:bg-grey-200 hover:shadow-md cursor-pointer">

                    <div class="flex justify-center item-center px-2 mr-3">
                        🚀
                    </div>

                    <div>

                        <h2 class="font-semibold text-xl">
                            {{ $article->title }}
                        </h2>

                        <p class="text-gray-700 my-2">
                            {{ $article->subtitle }}
                        </p>

                        <p class="text-sm text-gray-600">
                            {{  $article->published_at->diffForHumans() }}
                        </p>

                    </div>

                </li>

            </a>

        @empty

        <h2>No articles.</h2>

        @endforelse
    </ul>
</div>

@endsection
