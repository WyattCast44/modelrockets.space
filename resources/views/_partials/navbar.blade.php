<div class="flex items-center justify-between navbar-bg">

    <nav class="flex">

        <a href="{{ route('home') }}" class="p-4 hover:bg-indigo-600">
            <img src="{{ asset('nav-logo.png') }}" alt="Model rockets space logo" class="w-9 h-9">
        </a>
        
        <div class="hidden text-lg md:flex">

            <a 
                href="{{ route('forum.index') }}" 
                class="flex items-center px-5 py-4 text-white hover:text-white hover:bg-indigo-600 hover:no-underline">
                Forum
            </a>

            <a 
                href="{{ route('learn.index') }}" 
                class="flex items-center px-5 py-4 text-white hover:text-white hover:bg-indigo-600 hover:no-underline">
                Learn
            </a>

            <a 
                href="{{ route('articles.index') }}" 
                class="flex items-center px-5 py-4 text-white hover:text-white hover:bg-indigo-600 hover:no-underline">
                Articles
            </a>

            <a 
                href="{{ route('users.index') }}" 
                class="flex items-center px-5 py-4 text-white hover:text-white hover:bg-indigo-600 hover:no-underline">
                Members
            </a>

            <a 
                href="{{ route('search.index') }}" 
                class="flex items-center px-5 py-4 text-white hover:text-white hover:bg-indigo-600 hover:no-underline">
                Search
            </a>

        </div>

    </nav>

    <a href="#mobile-menu" class="block p-5 text-white hover:text-white md:hidden hover:bg-purple-500" data-turbolinks="false">
        @svg('menu', 'inline fill-current cursor-pointer')
    </a>

    <nav class="hidden text-lg md:block">

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
