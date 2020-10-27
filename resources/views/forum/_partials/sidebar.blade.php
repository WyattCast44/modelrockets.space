<nav class="space-y-2">

    <h2 class="text-lg font-bold text-gray-600">Discussion Boards</h2>

    <ul class="space-y-1">
        @foreach ($boards as $board)
            <li>
                <a class="block px-3 py-1 truncate rounded bg-cool-gray-200 hover:no-underline hover:bg-cool-gray-300" href="{{ $board->path('show') }}">
                    {{ $board->name }} <span class="text-xs">({{ $board->threads_count }})</span>
                </a>
            </li>
        @endforeach
    </ul>

</nav>