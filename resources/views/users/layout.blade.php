@extends('layouts.app')

@section('page-title', '@' . $user->username)

@section('content')

<header class="mb-10 flex flex-col bg-gray-200 border-b border-solid border-gray-300 pt-12">
    
    <div class="container flex justify-center md:justify-start">

        <div class="mr-5">
            <img src="{{  $user->gravatar }}" alt="{{  $user->username }}" class="rounded-full w-24">
        </div>

        <div>
            <h1 class="font-semibold text-xl sm:text-2xl md:text-3xl leading-none uppercase text-gray-700">{{ '@' . $user->username }}</h1>
            
            <p class="text-sm sm:text-base leading-none text-gray-600 italic my-3">{{ $user->profile->tagline }}</p>
            
            <div class="mt-4">
                
                <a href="#share" class="btn btn-sm rounded btn-outline-primary" data-turbolinks="false">
                    📤 Share
                </a>

                @if(auth()->check() && auth()->user()->id === $user->id)
                    <a href="#update-profile" class="btn btn-sm rounded btn-outline-primary" data-turbolinks="false">
                        ✏️ Edit My Profile
                    </a>
                    @include('users._partials.edit-profile')
                @endif

            </div>

        </div>

    </div>

    <nav class="container mt-12">

        <ul class="nav nav-tabs border-none">
            <li class="nav-item">
                <a class="nav-link {{ applyActive('users.show') }}" href="{{ $user->path('show') }}">Activity</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ applyActive('flights.index') }}" href="{{ route('flights.index', $user) }}">Flight Log</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ applyActive('') }}" href="#">Builds</a>
            </li>
        </ul>

    </nav>
</header>

@yield('user-content')

@include('users._partials.share')

@endsection