@extends('layouts.app')

@section('page-title', '@' . $user->username)

@section('content')

<header class="mb-10 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container flex justify-center md:justify-start">

        <div class="mr-5">
            <img src="{{  $user->gravatar }}" alt="{{  $user->username }}" class="rounded-full w-24">
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

<section class="container">

        <ul>
    
            @foreach ($activityGroups as $date => $activites)
    
                <li class="mb-5">
                        
                    <a href="#" class="rounded border border-solid border-gray-300 bg-gray-100 px-3 py-2 text-gray-700">{{ $date }}e</a>
        
                    <!-- Activites on date -->
                    <ul class="my-6 border-l border-solid border-gray-300 ml-5">
        
                        @foreach($activites as $activity)

                            <li class="p-4 pl-6 md:pl-16 mb-4">
                                <!-- Banner --> 
                                <h3 class="rounded bg-indigo-100 border border-solid border-indigo-300 p-3 text-lg font-semibold mb-4">
                                    <a href="{{ $user->path('show') }}">{{ $user->username }}</a> {{ $activity->method }} <a href="{{ $activity->subject->path('show') }}">{{ $activity->subject->title }}</a>
                                </h3>
            
                                <p class="px-3 text-gray-600">
                                    {{ strip_tags($activity->subject->excerpt) }}
                                </p>
                            </li>

                        @endforeach
        
                    </ul>
                    
                </li>

            @endforeach
            
        </ul>

        <p class="text-gray-900 text-center uppercase py-6 font-bold">
            🚖 End of the road pal 🌇
        </p>

</section>

@include('users._partials.share')

@endsection