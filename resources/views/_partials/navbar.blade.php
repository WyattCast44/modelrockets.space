<nav class="bg-white shadow-lg flex justify-between p-5 items-center print:hidden navbar-bg">

    <div class="flex items-center">

        <h2 class="text-xl mr-4">
            <a href="/" class="hover:no-underline text-white hover:text-white">
                Model Rockets 🚀🌌
            </a>
        </h2>

        <ul class="text-lg hidden md:block">
            <a href="/" class="mx-2 p-1 text-white hover:text-white hover:underline">Home</a>
            <a href="{{ route('forum.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Forum</a>
            {{-- <a href="#" class="mx-2 p-1 text-white hover:text-white hover:underline">Guides</a> --}}
            <a href="{{ route('articles.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Articles</a>
            <a href="{{ route('users.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Members</a>
            <a href="{{ route('features.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Roadmap</a>
        </ul>

    </div>

    <div class="block md:hidden text-white">
        <a href="#mobile-menu" class="text-white hover:text-white">
            @svg('menu', 'inline fill-current cursor-pointer')
        </a>
    </div>

    <ul class="text-lg hidden md:block">

        @guest
            <a href="#login" class="mx-2 p-1 text-white hover:text-white hover:underline">Login</a>
            <a href="#register" class="mx-2 p-1 text-white hover:text-white hover:underline">Register</a>
        @endguest

        @auth
            <a href="#" onclick="document.getElementById('logout-form').submit();" class="mx-2 p-1 text-white hover:text-white hover:underline">
                Logout
            </a>
        @endauth

    </ul>

</nav>