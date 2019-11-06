@extends('search.layout')

@section('search-page')

    @if($results->count() > 0) 
        
            @foreach ($results as $resultName => $data)

                <h2 class="font-medium mb-3 mt-10 text-xl">{{ $resultName }}</h2>               

                <ul class="list-none">
                    @foreach ($data as $item)
                    <li class="border bg-purple-200 p-4 my-2">{{ $item }}</li>
                    @endforeach
                </ul>

            @endforeach

    @else

        @if (request()->has('q'))
        
            <p class="text-center text-gray-600 text-2xl">
                Nothing to see here... Try searching again...
            </p>
    
            <div class="flex items-center justify-center mt-10">
                @svg('alien', 'h-64')
            </div>

        @else

            <p class="text-center text-gray-600 text-2xl">
                Try searching for something in the search box above...
            </p>
    
            <div class="flex items-center justify-center mt-10">
                @svg('rocket', 'h-64')
            </div>
            

        @endif

    @endif

@endsection