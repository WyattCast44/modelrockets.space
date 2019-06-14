@extends('layouts.app')

@section('page-title', '@' . $user->username)

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container flex">

        <div class="mr-5">
            <img src="{{  $user->gravatar }}" alt="{{  $user->username }}" class="rounded-full">
        </div>

        <div>
            <h1 class="font-semibold text-3xl leading-none uppercase">{{ '@' . $user->username }}</h1>
            <p class="leading-none text-gray-600 italic my-3">{{ $user->profile->tagline }}</p>
            <div>
                <button class="btn btn-sm rounded-full px-3 leading-none btn-outline-primary">Edit My Profile</button>
            </div>
        </div>

    </div>
</header>

@endsection