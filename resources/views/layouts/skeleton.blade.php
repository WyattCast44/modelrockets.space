<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <livewire:styles>
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

    @include('_partials.search')
    @include('_partials.mobile-menu')
    @include('sweetalert::alert')
    
    <livewire:scripts>
    @stack('scripts')
    
</body>
</html>