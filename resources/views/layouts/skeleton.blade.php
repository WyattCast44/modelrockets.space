<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
    <meta name="description" content="Model Rockets Space, for the love of rocketry.">
    <meta property="og:site_name" content="modelrockets.space">
    <meta property="og:locale" content="en_US"> 
    <meta property="og:description" content="Model Rockets Space, for the love of rocketry.">
    <meta property="og:url" content="https://modelrockets.space">
    {{-- <meta property="og:image" content="https://modelrockets.space/images/avatar-boxed.jpg"> --}}
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('/css/bs.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">

    
    <div id="app">

        @include('_partials.navbar')
        
        <main>
            
            @yield('main')
            
        </main>
        
    </div>
    
    
    @auth
        @include('_partials.logout')
    @endauth
    
    @include('sweetalert::alert')
    @include('_partials.mobile-menu')

</body>
</html>