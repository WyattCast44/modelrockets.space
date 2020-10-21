@section('page-title', 'Articles') 

<div>
    
    <header class="flex flex-col py-8 mb-8 bg-gray-200 border-b border-gray-300 border-solid sm:py-10 md:py-12">
        <div class="container">
            <h1 class="mb-2 text-4xl text-center">Articles</h1>

            <p class="text-center text-gray-600">
                Keep up with the latest model rocketry news, learn new skills and more!
            </p>
        </div>
    </header>

    <div class="container relative" style="top: -50px">

        <div class="overflow-hidden bg-gray-200 border border-gray-400 rounded-lg">
            
            <div class="px-4 py-5 bg-white border-b border-gray-400 sm:px-6">
                <input type="text" wire:model="search" class="m-0 form-control" placeholder="Search articles...">
            </div>
            
            <ul class="bg-white divide-y">
    
                @foreach ($articles as $article)
            
                    <li class="flex p-5 hover:bg-cool-gray-200">
                        
                        <div class="space-y-2">
                            <!-- Title -->
                            <h2 class="text-lg font-semibold sm:text-xl">
                                <a href="{{ $article->path('show') }}">{{ $article->title }}</a>
                            </h2>
        
                            <!-- Subtitle -->
                            <p class="text-gray-700">
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
        
    </div>

</div>