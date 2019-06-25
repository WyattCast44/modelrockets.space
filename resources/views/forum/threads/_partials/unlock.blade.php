<form action="{{ route('threads.unlock', ['board' => $thread->board, 'thread' => $thread]) }}" method="post">
    @csrf
    @honeypot
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-primary mr-2">🔒 Unlock Thread</button>
</form>