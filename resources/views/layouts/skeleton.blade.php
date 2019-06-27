<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts._partials.head-meta')
    @include('layouts._partials.head-assets')
</head>

<body class="bg-white-100 antialiased">

    <header>
        @include('_partials.navbar')
    </header>
    
    <main>
        @yield('main')
    </main>

    @include('_partials.mobile-menu')
    @include('sweetalert::alert')

</body>
</html>