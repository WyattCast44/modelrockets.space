<nav class="bg-white shadow-md flex justify-between p-5 items-center">

    <div class="flex items-center">

        <h2 class="text-2xl mr-2">
            <a href="/" class="hover:no-underline">Model Rockets 🚀</a>
        </h2>

        <ul class="text-lg">
            <a href="/" class="mx-2 p-1 hover:text-red-700">Home</a>
            <a href="#" class="mx-2 p-1 hover:text-red-700">Forum</a>
            <a href="#" class="mx-2 p-1 hover:text-red-700">Guides</a>
            <a href="{{ route('articles.index') }}" class="mx-2 p-1 hover:text-red-700">Articles</a>
        </ul>

    </div>


    <ul class="text-lg">
        @guest
        <a href="{{ route('login') }}" class="mx-2 p-1 hover:text-red-700">Login</a>
        <a href="{{ route('register') }}" class="mx-2 p-1 hover:text-red-700">Register</a>
        @endguest

        @auth
        <a href="#" onclick="document.getElementById('logout-form').submit();" class="mx-2 p-1 hover:text-red-700">Logout</a>
        @endauth
    </ul>

</nav>