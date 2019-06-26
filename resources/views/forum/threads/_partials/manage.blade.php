@modal(['name' => 'manage'])

    <h1 class="text-gray-700 font-semibold text-2xl mb-5 uppercase">Manage Thread</h1>

    @if($thread->open)
        @include('forum.threads._partials.lock')
    @else
        @include('forum.threads._partials.unlock')    
    @endif

    <form action="{{ route('threads.delete', ['board' => $board, 'thread' => $thread]) }}" method="POST" class="block mt-5">
        @csrf
        @honeypot
        @method('DELETE')
        <button type="submit" class="btn btn-outline-primary rounded btn-sm mr-2 md:mr-0 mt-2 md:mt-0">🗑️ Delete Thread</button>
    </form>

@endmodal