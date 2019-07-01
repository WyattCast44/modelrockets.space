<form action="{{ $article->path('unfavorite') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-primary">👎 Unfavorite</button>
</form>