<div>    

    <div class="mb-8">
        <div class="flex items-center">
            <input type="text" wire:model="search" class="m-0 form-control focus:shadow hover:shadow" placeholder="Search articles..." autofocus>
        </div>
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