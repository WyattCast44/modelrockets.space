<li class="block mb-5 border border-solid border-gray-300 bg-white hover:bg-gray-100 py-6 px-6 rounded-lg shadow-md hover:border-2 hover:border-solid hover:border-blue-600 hover:shadow-lg">
    
    <div class="flex flex-wrap md:justify-between">

        <!-- Thread -->
        <div class="w-100 md:w-3/4 flex flex-col justify-between">
            <a href="{{ $thread->path() }}" class="text-lg">
                {{ $thread->title }}
            </a>

            <p class="my-3 text-sm text-gray-600">
                {{ strip_tags($thread->excerpt) }}
            </p>

            <p class="text-xs text-gray-600">
                Posted {{ $thread->created_at->diffForHumans() }} by <a href="{{ route('users.show', $thread->user) }}">{{ '@' . $thread->user->username }}</a>
            </p>
        </div>

        <!-- Board -->
        <div class="flex justify-end items-start md:pl-4 md:w-1/4">
            <a href="{{ $thread->board->path($thread->board) }}" class="btn btn-sm px-3 btn-outline-primary rounded md:rounded-full">
                {{ $thread->board->name }}
            </a>
        </div>

    </div>

</li>  