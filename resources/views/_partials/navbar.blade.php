<nav class="bg-white shadow-md flex justify-between p-5 items-center print:hidden">

    <div class="flex items-center">

        <h2 class="text-2xl mr-4">
            <a href="/" class="hover:no-underline text-gray-800 hover:text-gray-800">Model Rockets Space 🚀</a>
        </h2>

        <ul class="text-lg">
            <a href="/" class="mx-2 p-1">Home</a>
            <a href="#" class="mx-2 p-1">Forum</a>
            <a href="#" class="mx-2 p-1">Guides</a>
            <a href="{{ route('articles.index') }}" class="mx-2 p-1">Articles</a>
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