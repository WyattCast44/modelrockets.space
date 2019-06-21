@extends('layouts.app')

@section('page-title', '@' . $user->username)

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container flex justify-center md:justify-start">

        <div class="mr-5">
            <img src="{{  $user->gravatar }}" alt="{{  $user->username }}" class="rounded-full">
        </div>

        <div>
            <h1 class="font-semibold text-xl sm:text-2xl md:text-3xl leading-none uppercase text-gray-700">{{ '@' . $user->username }}</h1>
            
            <p class="text-sm sm:text-base leading-none text-gray-600 italic my-3">{{ $user->profile->tagline }}</p>
            
            <div class="mt-3">
                
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
</header>


@include('users._partials.share')

@endsection