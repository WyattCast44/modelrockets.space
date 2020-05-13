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

       <livewire:articles.index>

    </div>

@endsection
