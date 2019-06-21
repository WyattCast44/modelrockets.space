@extends('forum.layout')

@section('page-title', 'Forum')

@section('forum-page')

    <div class="mb-16 mx-auto" style="width:1500px; max-width:90%;">

        <div class="flex">

            <!-- Filters Sidebar -->
            {{-- <div class="w-1/6 px-3 hidden lg:block">
                <div>
                    <h2 class="font-semibold text-2xl mb-3 uppercase text-gray-600">Filters</h2>
                    <ul class="list-disc">
                        <li>All</li>
                        <li>New</li>
                    </ul>
                </div>
            </div> --}}

            <!-- Threads Index -->
            <div class="flex-1 px-3 mx-3">
                
                <div>

                    <h2 class="font-semibold text-2xl mb-3 uppercase text-gray-600">Recent Threads</h2>

                    <ul>

                        @foreach ($threads as $thread)
                            @include('forum._partials.thread')  
                        @endforeach
    
                    </ul>
    
                    <div class="my-10">
                        {{ $threads->links() }}
                    </div>

                </div>

            </div>

            <!-- Boards Sidebar -->
            <div class="w-1/5 px-3 hidden md:block lg:block">
                <div>
                    <h2 class="font-semibold text-2xl mb-3 text-center uppercase text-gray-600">Boards</h2>
                    <ul class="text-center">
                        @foreach ($boards as $board)
                            <li>
                                <a href="{{ route('boards.show', $board) }}"
                                class="btn btn-sm btn-outline-primary rounded-full uppercase hover:shadow-lg mb-2 shadow-sm block">
                                    {{ $board->name }}
                                </a>
                            </li>                            
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection