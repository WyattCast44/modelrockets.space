@extends('layouts.app')

@section('page-title', 'Public Users')

@section('content')

<header class="flex flex-col pt-16 pb-20 bg-gray-200 border-b border-gray-300 border-solid">
    <div class="container">

        <h1 class="mb-3 text-4xl text-center">All Public Members</h1>

        <p class="text-center text-gray-600">
            Meet new friends, discover old pals, and stay connected to your fellow rocketers!
        </p>

    </div>
</header>

<livewire:users.index>

@endsection