<div class="flex items-center justify-between p-5 bg-white shadow-lg print:hidden navbar-bg">

    <nav class="flex items-center">

        <h2 class="mr-4 text-base sm:text-lg md:text-xl">
            <a href="/" class="text-white hover:no-underline hover:text-white">
                Model Rockets Space 🚀🌌
            </a>
        </h2>

        <nav class="hidden text-lg md:block">
            {{-- <a href="/" class="p-1 mx-2 text-white hover:text-white hover:underline">Home</a> --}}
            <a href="{{ route('forum.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Forum</a>
            <a href="{{ route('learn.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Learn</a>
            <a href="{{ route('articles.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Articles</a>
            <a href="{{ route('users.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Members</a>
            <a href="{{ route('search.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Search</a>
            {{-- <a href="{{ route('features.index') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">Roadmap</a> --}}
        </nav>

    </nav>

    <div class="block text-white md:hidden">
        <a href="#mobile-menu" class="text-white hover:text-white" data-turbolinks="false">
            @svg('menu', 'inline fill-current cursor-pointer')
        </a>
    </div>

    <nav class="flex hidden text-lg md:block">

        @guest
            <a href="{{ route('login') }}" class="p-1 mx-2 text-lg text-white hover:text-white hover:underline">
                Login
            </a>
            <a href="{{ route('register') }}" class="p-1 mx-2 text-white hover:text-white hover:underline">
                Register
            </a>
        @endguest

        @auth
            <a href="{{ route('users.show', auth()->user()) }}" class="p-1 mx-2 text-lg text-white hover:text-white hover:underline">
                My Profile
            </a>
            <form action="{{ route('logout') }}" method="post" class="inline-block">
                @csrf
                <button type="submit" class="p-1 mx-2 text-lg text-white hover:text-white hover:underline">Logout</button>
            </form>
        @endauth

    </nav>

</div>
