@extends('layouts.app')

@section('page-title', 'Home')

@section('content')

<header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 pt-12">
    <div class="container">
        <h2 class="text-center text-3xl font-semibold">Love Model Rockets? We do to.</h1>
        <h3 class="text-center text-2xl my-4 text-gray-700">Join The Community Now! <a href="#register" data-turbolinks="false">Register</a></h2>
        <div class="flex justify-center">
            <img src="{{ asset('rocket.png') }}" alt="" class="relative w-64" style="top:50px;">   
        </div>
    </div>
</header>

{{-- <header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Model Rockets Space</h1>
        <p class="text-gray-700 text-lg">
            Home of Model Rocketry in Known Universe!
        </p>
    </div>
</header>

<div class="container mx-auto py-16">
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
</div> --}}

@endsection