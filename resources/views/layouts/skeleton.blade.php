<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts._partials.head-meta')
    @include('layouts._partials.head-assets')
</head>

<body class="bg-gray-100">
    
    <div id="app">

        @include('_partials.navbar')
        
        <main>
            
            @yield('main')
            
        </main>
        
    </div>
    
    @include('sweetalert::alert')
    @include('_partials.mobile-menu')

</body>
</html>