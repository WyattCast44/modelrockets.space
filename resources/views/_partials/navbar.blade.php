
<div class="bg-white shadow-lg flex justify-between p-5 items-center print:hidden navbar-bg">

    <nav class="flex items-center">

        <h2 class="text-base sm:text-lg md:text-xl mr-4">
            <a href="/" class="hover:no-underline text-white hover:text-white">
                Model Rockets Space 🚀🌌
            </a>
        </h2>

        <nav class="text-lg hidden md:block">
            <a href="/" class="mx-2 p-1 text-white hover:text-white hover:underline">Home</a>
            <a href="{{ route('forum.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Forum</a>
            <a href="{{ route('articles.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Articles</a>
            <a href="{{ route('users.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Members</a>
            <a href="{{ route('features.index') }}" class="mx-2 p-1 text-white hover:text-white hover:underline">Roadmap</a>
        </nav>

    </nav>

    <div class="block md:hidden text-white">
        <a href="#mobile-menu" class="text-white hover:text-white" data-turbolinks="false">
            @svg('menu', 'inline fill-current cursor-pointer')
        </a>
    </div>

    <nav class="text-lg hidden md:block flex">

        {{-- <a href="#search" class="text-lg mx-2 p-1 text-white hover:text-white hover:underline" data-turbolinks="false">Search</a> --}}

        @guest
            <a href="#login" class="text-lg mx-2 p-1 text-white hover:text-white hover:underline" data-turbolinks="false">Login</a>
            <a href="#register" class="mx-2 p-1 text-white hover:text-white hover:underline" data-turbolinks="false">Register</a>
        @endguest

        @auth
            <a href="{{ route('users.show', auth()->user()) }}" class="mx-2 text-lg p-1 text-white hover:text-white hover:underline">
                My Profile
            </a>
            <form action="{{ route('logout') }}" method="post" class="inline-block">
                @csrf
                <button type="submit" class="mx-2 p-1 text-white hover:text-white hover:underline text-lg">Logout</button>
            </form>
        @endauth

    </nav>

</div>
