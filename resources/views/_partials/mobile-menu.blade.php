@fullmodal(['name' => 'mobile-menu'])

    <div class="text-center">
        <a href="/" class="block p-3 text-xl text-white hover:text-white hover:underline">Home</a>
        <a href="{{ route('forum.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Forum</a>
        <a href="{{ route('articles.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Articles</a>
        <a href="{{ route('users.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Members</a>
        <a href="{{ route('features.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Roadmap</a>        
    </div>

@endfullmodal