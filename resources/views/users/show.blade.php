@extends('users.layout')

@section('user-content')

<section class="container mb-16">

    <ul>

        @foreach ($activityGroups as $date => $activites)

            <li class="mb-5">
                    
                <span class="rounded border border-solid border-gray-300 bg-gray-100 px-3 py-2 text-gray-700">{{ $date }}</span>
    
                <!-- Activites on date -->
                <ul class="my-6 border-l border-solid border-gray-300 ml-5">
    
                    @foreach($activites as $activity)

                        <li class="p-4 pl-6 md:pl-16 mb-4">

                            <h3 class="rounded bg-indigo-100 border border-solid border-indigo-300 p-3 text-lg font-semibold mb-4">
                                
                                <a href="{{ $user->path('show') }}">
                                    {{ $user->username }}
                                </a> 
                                
                                {{ $activity->method }} 
                                
                                @if($activity->subject <> null)
                                    <a href="{{ $activity->subject->path('show') }}">
                                        {{ $activity->subject->activity_title }}
                                    </a>
                                @endif

                            </h3>
        
                            @if($activity->subject <> null)
                                <p class="px-3 text-gray-600">
                                    {{ strip_tags($activity->subject->activity_excerpt) }}
                                </p>
                            @endif

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

@endsection
