@extends('layouts.app')

@section('page-title', 'Home')

@section('content')

<header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Model Rockets Space</h1>
        <p class="text-gray-700 text-lg">
            Home of Model Rocketry in Known Universe!
        </p>
    </div>
</header>

{{-- <div class="container mx-auto py-16">
    <div class="flex flex-wrap justify-between items-center">

        <div class="w-1/3 px-3">
            <div class="bg-white rounded border border-solid py-3 px-4">
                Articles
            </div>
        </div>
        <div class="w-1/3 px-3">
            <div class="bg-white rounded border border-solid py-3 px-4">
                Forum
            </div>
        </div>
        <div class="w-1/3 px-3">
            <div class="bg-white rounded border border-solid py-3 px-4">
                Gear
            </div>
        </div>

    </div>
</div>

<div class="py-12 bg-gray-200 border-t border-b border-gray-300">
    <div class="container">
        <h2 class="text-center text-gray-700 font-semibold text-3xl mb-5">Sponsors</h2>
        
        <div class="flex justify-center items-center">
            <a href="https://www.apogeerockets.com/">
                <img src="{{ asset('img/sponsors/apogee.png') }}" alt="Apogee Rockets" class="w-32 p-4 m-5">
            </a>

            <a href="https://bps.space/">
                <img src="{{ asset('img/sponsors/bps.png') }}" alt="BPS.Space" class="w-32 p-4 m-5">
            </a>
        </div>
    </div>
</div> --}}

@endsection