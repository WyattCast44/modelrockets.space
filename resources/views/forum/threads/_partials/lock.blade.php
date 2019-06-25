<form action="{{ route('threads.lock', ['board' => $thread->board, 'thread' => $thread]) }}" method="post">
    @csrf
    @honeypot
    <button type="submit" class="btn btn-sm btn-outline-primary mr-2">🔒 Lock Thread</button>
</form>