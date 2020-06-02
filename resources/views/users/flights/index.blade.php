@extends('users.layout')

@section('user-content')

    <div class="container mb-16">

        @if(auth()->check() && auth()->user()->id === $user->id)
            <div class="flex mb-10">
                <a href="{{ route('flights.create', $user) }}" class="btn btn-outline-primary">Add Flight Record</a>
            </div>
        @endif
        
        <ul>

            @forelse ($flightGroups as $date => $flights)
    
                <!-- Date Groups -->
                <li class="mb-5">
                    
                    <!-- Date Group Label -->
                    <span class="px-3 py-2 text-gray-700 bg-gray-100 border border-gray-300 border-solid rounded">{{ $date }}</span>
        
                    <!-- Activites on date -->
                    <ul class="my-6 ml-5 border-l border-gray-300 border-solid">
        
                        @foreach($flights as $flight)
    
                            <li class="p-4 pl-6 mb-4 md:pl-16">
    
                                <h3 class="p-3 mb-4 text-lg font-semibold bg-indigo-100 border border-indigo-300 border-solid rounded">
                                    
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

            @empty

                <li>
                    <div class="flex flex-col items-center justify-center px-10 border-4 border-gray-700 border-dashed">
                        <h2 class="mb-8 text-3xl font-semibold text-center text-gray-500">{{ $user->username }} hasn't logged any flight yet</h2>
                        @svg('no-flights', 'w-64 h-64')
                    </div>
                </li>
    
            @endforelse
            
        </ul>

    </div>

@endsection