@extends('search.layout')

@section('search-page')

    @if($results->count() > 0) 
        
            @foreach ($results as $resultName => $data)

                <h2 class="mt-10 mb-3 text-xl font-medium">{{ $resultName }}</h2>               

                <ul class="list-none">
                    @foreach ($data as $item)
                        <li class="p-4 my-2 bg-purple-200 border">
                            {{ $item->id }}
                        </li>
                    @endforeach
                </ul>

            @endforeach

    @else

        @if (request()->has('q'))
        
            <p class="text-2xl text-center text-gray-600">
                Nothing to see here... Try searching again...
            </p>
    
            <div class="flex items-center justify-center mt-10">
                @svg('alien', 'h-64')
            </div>

        @else

            <p class="text-2xl text-center text-gray-600">
                Try searching for something in the search box above...
            </p>
    
            <div class="flex items-center justify-center mt-10">
                @svg('rocket', 'h-64')
            </div>
            

        @endif

    @endif

@endsection