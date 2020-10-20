<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts._partials.head-meta')
    @include('layouts._partials.head-assets')
    
</head>
<body class="antialiased bg-white-100">

    <header>
        @include('_partials.navbar')
    </header>
    
    <main>
        @yield('main')
    </main>

    @include('_partials.mobile-menu')
    @include('sweetalert::alert')
    
    @stack('scripts')
    
</body>
</html>