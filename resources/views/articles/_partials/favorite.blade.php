@auth
    @if ($article->hasUserFavorited()) 
        <!-- Unfavorite -->
        <form action="{{ $article->path('unfavorite') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-primary">👎 Unfavorite</button>
        </form>
    @else
        <!-- Favorite -->
        <form action="{{ $article->path('favorite') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-primary">👍 Favorite</button>
        </form>
    @endif    
@endauth
