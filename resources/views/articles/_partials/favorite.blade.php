<form action="{{ $article->path('favorite') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-primary">👍 Favorite</button>
</form>