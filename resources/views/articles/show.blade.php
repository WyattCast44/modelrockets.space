<x-layout name="layouts.app" :title="$article->title" section="content">

    <header class="flex flex-col py-8 mb-8 bg-gray-200 border-b border-gray-300 border-solid sm:py-10 md:py-12">
        <div class="container">

            <a href="{{ route('articles.index') }}" class="inline-block mb-2 text-sm print:hidden">&leftarrow; Back to Articles</a>

            <h1 class="mb-3 text-2xl font-semibold sm:text-3xl md:text-4xl">{{ $article->title }}</h1>

            <h2 class="m-0">{{ $article->subtitle }}</p>

        </div>
    </header>

    <main class="container mx-auto mt-5 mb-12">

        @if ($article->published_at == null)

            <div class="p-3 mb-8 font-bold text-center text-red-600 bg-red-100 border-2 border-red-300 border-dashed rounded">
                This is a preview only! You must publish the article for others to see it.
            </div>
            
        @endif

        <!-- Actions -->
        <div class="flex items-center justify-center mb-4 sm:mb-6 md:mb-8 md:justify-start print:hidden">

            <!-- Print -->
            <div x-data="{}">
                <button class="mr-2 btn btn-outline-primary btn-sm" data-turbolinks="false" x-on:click="window.print()">🖨️ Print</button>
            </div>
            
            <!-- Share -->
            <a href="#share" class="mr-2 btn btn-outline-primary btn-sm" data-turbolinks="false">📤 Share</a>

            <x-share title="Article" ></x-share>

            <!-- Discuss -->
            @if($article->thread_id <> null) 
                <a href="{{ $article->path('discuss') }}" class="mr-2 btn btn-outline-primary btn-sm" data-turbolinks="false">️️️️️️🗣️ Discuss</a>
            @endif

            @include('articles._partials.favorite')

        </div>        

        <!-- Article Meta -->
        <p class="my-1 text-sm text-center text-gray-500 md:mb-8 md:text-left">

            {{ ($article->hasBeenUpdated()) ? 'Posted ' : 'Updated ' }}

            {{ $article->updated_at->diffForHumans() }} 

            by
            
            <a href="{{ route('users.show', $article->user) }}">
                {{ '@' . $article->user->username }}
            </a>
        </p>

        <!-- Article Body -->
        <article class="markdown-body">
            
            {!! $article->body !!}
            
        </article>

    </main>

</x-layout>