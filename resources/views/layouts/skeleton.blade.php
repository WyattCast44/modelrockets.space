<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('/css/bs.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 h-100">

    @include('sweetalert::alert')

    <div id="app">

        @include('_partials.navbar')

        <main>

            @yield('main')

        </main>

    </div>

    @include('_partials.mobile-menu')
    @include('_partials.logout')

</body>
</html>