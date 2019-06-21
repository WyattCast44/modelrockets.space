@fullmodal(['name' => 'mobile-menu'])

    <div class="text-center">
        <a href="/" class="block p-3 text-xl text-white hover:text-white hover:underline">Home</a>
        <a href="{{ route('forum.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Forum</a>
        <a href="{{ route('articles.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Articles</a>
        <a href="{{ route('users.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Members</a>
        <a href="{{ route('features.index') }}" class="block p-3 text-xl text-white hover:text-white hover:underline">Roadmap</a>        

        <div class="flex mt-3 text-center justify-center items-center">
            @auth
                <a href="{{ route('users.show', auth()->user()) }}" class="block p-3 text-xl text-white hover:text-white hover:underline">My Profile</a>        
                <a href="#" onclick="document.getElementById('logout-form').submit();" class="block p-3 text-xl text-white hover:text-white hover:underline" data-turbolinks="false">
                    Logout
                </a>
            @endauth

            @guest

                <a href="#login" class="block p-3 text-xl text-white hover:text-white hover:underline" data-turbolinks="false">Login</a>        
                <a href="#register" class="block p-3 text-xl text-white hover:text-white hover:underline" data-turbolinks="false">Register</a>        

            @endguest
        </div>

    </div>

@endfullmodal