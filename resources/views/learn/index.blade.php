@extends('layouts.app')

@section('page-title', 'Learning Center')

@section('content')

<header class="flex flex-col py-12 mb-8 bg-gray-200 border-b border-gray-300 border-solid">
    <div class="container">
        <h1 class="mb-2 text-3xl font-semibold">Learning Center</h1>
        <p class="text-gray-700">
            Greetings fellow rocketeers! Welcome to the learning center, a place for begineers and
            seasoned flyers alike. The lessons are generally created by <a href="#">me</a> and
            reflect
            what I am learning at the moment. But if you have any suggestion on what you'd like to
            see,
            please let me know <a href="#">here</a>. In the meantime, enjoy and I hope you learn
            something
            useful.
        </p>
    </div>
</header>

<!-- Featured -->
<section class="container mb-16">

    <div class="relative">

        <div class="text-center">
            <h2
                class="text-3xl font-bold leading-9 tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                Featured Playlists
            </h2>
        </div>

        <div class="grid max-w-lg gap-5 mx-auto mt-12 lg:grid-cols-2 lg:max-w-none">

            @foreach($featuredPlaylists as $playlist)

                <div class="flex flex-col overflow-hidden bg-gray-100 border border-gray-400 rounded-lg shadow hover:bg-gray-200 hover:shadow-lg">

                    <!-- Hero Image -->
                    <div class="flex-shrink-0">
                        <img class="object-cover w-full h-48"
                            src="{{ $playlist->image_url }}"
                            alt="{{ $playlist->name }} Cover Image" />
                    </div>

                    <!-- Card -->
                    <div class="flex flex-col justify-between flex-1 p-6">
                        <div class="flex-1">
                            {{-- <p class="text-sm font-medium leading-5 text-indigo-600">
                                <a href="#"
                                class="hover:underline">
                                    Blog
                                </a>
                            </p> --}}
                            <a href="{{ $playlist->path('show') }}"
                            class="block">
                                <h3 class="mt-2 text-xl font-semibold leading-7 text-gray-900">
                                    {{ $playlist->name }}
                                </h3>
                                <p class="mt-3 text-base leading-6 text-gray-500">
                                    {{ Str::limit($playlist->description, 150) }}
                                </p>
                            </a>
                        </div>
                        <div class="flex items-center mt-6">
                            <div>
                                <p class="text-sm font-medium leading-5 text-gray-900">
                                    <a href="#"
                                    class="hover:underline">
                                        Roel Aufderhar
                                    </a>
                                </p>
                                <div class="flex text-sm leading-5 text-gray-500">
                                    <time datetime="2020-03-16">
                                        Mar 16, 2020
                                    </time>
                                    <span class="mx-1">
                                        &middot;
                                    </span>
                                    <span>
                                        6 min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

</section>

@endsection