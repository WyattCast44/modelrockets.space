@extends('layouts.app')

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 pt-10">
    
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2 text-center">Open Source Data</h1>

        <p class="text-gray-600 text-center">
            Open source datasets.
        </p>
    </div>

    <nav class="container">
        <ul class="nav nav-tabs border-none">
            <li class="nav-item">
                <a class="nav-link {{ applyActive('data.motors.index') }}" href="{{ route('data.motors.index') }}">Motors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ applyActive('data.vendors.index') }}" href="{{ route('data.vendors.index') }}">Vendors</a>
            </li>
        </ul>
    </nav>

</header>

<div class="mb-16">
    @yield('data-content')
</div>

@endsection