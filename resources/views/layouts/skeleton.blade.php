<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Model Rockets, Rocketry, Rockets, Model Rocket, Model Rocket Forum, Learn Rocketry">
    <meta name="description" content="Welcome to Model Rockets Space - The home for model rocket and space enthusiasts">
    
    <title>@yield('page-title') - Model Rockets Space 🚀🌌</title>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Model Rockets Space 🚀👩‍🚀👨‍🚀">
    <meta name="twitter:description" content="Model Rockets Space | The home for model rocket and space enthusiasts">
    <meta name="twitter:image" content="{{ asset('logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ route('home') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Model Rockets Space 🚀👩‍🚀👨‍🚀">
    <meta property="og:description" content="Model Rockets Space | The home for model rocket and space enthusiasts">
    <meta property="og:image" content="{{ asset('logo.png') }}">

    <!-- Assets -->
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

    @include('_partials.mobile-menu')
    @include('sweetalert::alert')
    
    <livewire:scripts>
    @stack('scripts')
    
</body>
</html>