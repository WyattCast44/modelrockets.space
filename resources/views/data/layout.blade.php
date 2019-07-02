@extends('layouts.app')

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-8 sm:py-10 md:py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2 text-center">Open Source Data</h1>

        <p class="text-gray-600 text-center">
            Open source datasets.
        </p>
    </div>
</header>

<div class="container mb-16">
    @yield('data-content')
</div>

@endsection