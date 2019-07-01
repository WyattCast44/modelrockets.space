@extends('users.layout')

@section('user-content')

    <div class="container mb-16">

        @if(auth()->check() && auth()->user()->id === $user->id)
            <div class="flex mb-10">
                <a href="{{ route('flights.create', $user) }}" class="btn btn-outline-primary">Add Flight Record</a>
            </div>
        @endif
        
        <ul>

            @foreach ($flightGroups as $date => $flights)
    
                <!-- Date Groups -->
                <li class="mb-5">
                    
                    <!-- Date Group Label -->
                    <span class="rounded border border-solid border-gray-300 bg-gray-100 px-3 py-2 text-gray-700">{{ $date }}</span>
        
                    <!-- Activites on date -->
                    <ul class="my-6 border-l border-solid border-gray-300 ml-5">
        
                        @foreach($flights as $flight)
    
                            <li class="p-4 pl-6 md:pl-16 mb-4">
    
                                <h3 class="rounded bg-indigo-100 border border-solid border-indigo-300 p-3 text-lg font-semibold mb-4">
                                    
                                    <a href="{{ $flight->path('show') }}">
                                        {{ $flight->rocket }}
                                    </a>
                                    
                                </h3>
            
                                <p class="px-3 text-gray-600">
                                    {{ $flight->excerpt }}
                                </p>
                                
                            </li>
    
                        @endforeach
        
                    </ul>
                    
                </li>
    
            @endforeach
            
        </ul>

    </div>

@endsection