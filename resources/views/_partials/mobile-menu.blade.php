@fullmodal(['name' => 'mobile-menu'])

    <div class="text-center">
        <a href="/" class="block p-3 text-xl text-white hover:text-white hover:underline">Home</a>
        <a href="{{ route('forum.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Forum</a>
        <a href="{{ route('learn.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Learn</a>
        <a href="{{ route('articles.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Articles</a>
        <a href="{{ route('users.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Members</a>
        <a href="{{ route('search.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Search</a>

        <div class="flex items-center justify-center mt-3 text-center">
            @auth
                <a href="{{ route('users.show', auth()->user()) }}" class="block p-3 text-xl text-white hover:text-white hover:underline">My Profile</a>        
                <form action="{{ route('logout') }}" method="post" class="inline-block">
                    @csrf
                    <button type="submit" class="p-1 mx-2 text-lg text-white hover:text-white hover:underline">Logout</button>
                </form>
            @endauth

            @guest

                <a href="{{ route('login') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">
                    Login
                </a>        
                <a href="#register" class="block p-3 text-xl text-white hover:text-white hover:underline" data-turbolinks="false">Register</a>        

            @endguest
        </div>
    
    </div>

@endfullmodal