@if (auth()->check() && $article->hasUserFavorited()) 
    <button wire:click="unfavorite" class="btn btn-sm btn-outline-primary">👎 Unfavorite</button>
@else
    <button wire:click="favorite" class="btn btn-sm btn-outline-primary">👍 Favorite</button>
@endif    
