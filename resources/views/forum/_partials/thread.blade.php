<li class="block px-6 py-6 bg-white hover:bg-gray-100">
    
    <div class="flex flex-wrap md:justify-between">

        <!-- Thread -->
        <div class="flex flex-col justify-between w-100 md:w-3/4">
            <a href="{{ $thread->path() }}" class="text-lg">
                {{ $thread->title }}
            </a>

            <p class="my-3 text-sm text-gray-600">
                {{ strip_tags($thread->excerpt) }}
            </p>

            <p class="text-xs text-gray-600">
                Posted {{ $thread->created_at->diffForHumans() }} by <a href="{{ route('users.show', $thread->user) }}">{{ '@' . $thread->user->username }}</a> &middot; {{ ($thread->replies_count == 1) ? $thread->replies_count . ' reply' : $thread->replies_count . ' replies'  }}
            </p>
        </div>

        <!-- Board -->
        <div class="flex items-start justify-end md:pl-4 md:w-1/4">
            <a href="{{ $thread->board->path($thread->board) }}" class="px-3 rounded btn btn-sm btn-outline-primary md:rounded-full">
                {{ $thread->board->name }}
            </a>
        </div>

    </div>

</li>  