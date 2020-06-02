@extends('layouts.app')

@section('page-title', '@' . $user->username)

@section('content')

<header class="flex flex-col pt-12 mb-10 bg-gray-200 border-b border-gray-300 border-solid">
    
    <div class="container flex md:justify-start">

        <div class="mr-5">
            <img src="{{  $user->gravatar }}" alt="{{  $user->username }}" class="w-24 rounded-full">
        </div>

        <div>
            <h1 class="text-xl font-semibold leading-none text-gray-700 uppercase sm:text-2xl md:text-3xl">{{ '@' . $user->username }}</h1>
            
            <p class="my-3 text-sm italic leading-none text-gray-600 sm:text-base">{{ $user->profile->tagline }}</p>
            
            <div class="mt-4">
                
                <a href="#share" class="rounded btn btn-sm btn-outline-primary" data-turbolinks="false">
                    📤 Share
                </a>

                <x-share title="Profile"></x-share>

                @if(auth()->check() && auth()->user()->id === $user->id)
                    <a href="#update-profile" class="rounded btn btn-sm btn-outline-primary" data-turbolinks="false">
                        ✏️ Edit My Profile
                    </a>
                    @include('users._partials.edit-profile')
                @endif

            </div>

        </div>

    </div>

    <nav class="container mt-12">

        <ul class="border-none nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ applyActive('users.*') }}" href="{{ $user->path('show') }}">Activity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ applyActive('flights.*') }}" href="{{ route('flights.index', $user) }}">Flight Log</a>
            </li>

            @if(config('features.user-galleries'))
                <li class="nav-item">
                    <a class="nav-link {{ applyActive('users.gallery.*') }}" href="{{ $user->path('gallery') }}">Gallery</a>
                </li>
            @endif

        </ul>

    </nav>
    
</header>

@yield('user-content')

@endsection