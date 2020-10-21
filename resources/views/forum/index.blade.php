@extends('forum.layout')

@section('page-title', 'Forum')

@section('forum-page')

    <div class="container">

        <ul>

            @foreach ($threads as $thread)
                @include('forum._partials.thread')  
            @endforeach

        </ul>

        <div class="flex justify-center my-10 md:justify-start">
            {{ $threads->appends(request()->except('page'))->links() }}
        </div>

    </div>

@endsection