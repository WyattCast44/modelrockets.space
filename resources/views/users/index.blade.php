@extends('layouts.app')

@section('page-title', 'Public Users')

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">

        <h1 class="text-center text-4xl">All Public Users</h1>

        <p class="text-center text-gray-600">
            Meet new friends, discover old pals, and stay connected to your fellow rocketers!
        </p>

    </div>
</header>

<div class="container p-5 bg-white rounded my-12 shadow-md border border-solid border-gray-300">

    <div class="px-2">
        <div class="flex -mx-2 flex-wrap">

            @forelse($users as $user)

                <div class="w-1/3 px-2">
                    <div class="h-12">
                        <a href="{{ route('users.show', $user) }}">
                        {{ '@' . $user->username }}
                        </a>
                    </div>
                </div>   

            @empty
            @endforelse

        </div>
    </div>

</div>

@endsection