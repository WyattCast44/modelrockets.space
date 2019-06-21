<li class="block mb-3 border border-solid border-gray-300 bg-white py-5 px-6 rounded-lg shadow-md hover:border-2 hover:border-solid hover:border-blue-300 hover:shadow-lg">
    
    <div class="flex flex-wrap">

        <div class="flex-1">
            <a href="{{ $thread->path() }}" class="text-lg">
                {{ $thread->title }}
            </a>
        
            <p class="my-3 text-sm text-gray-600">
                {{ Str::limit($thread->body, 225) }}
            </p>
        </div>

        <div class="flex justify-center items-center ml-4">
            <a href="{{ $thread->board->path($thread->board) }}" class="btn btn-sm px-3 btn-outline-primary rounded-full">
                {{ $thread->board->name }}
            </a>
        </div>

    </div>

</li>  