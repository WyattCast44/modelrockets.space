@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto my-10">
    <div class="flex w-full space-x-4">

        <div class="w-9/12">@yield('forum-page')</div>
        
        <div class="w-3/12">
            @include('forum._partials.sidebar')
        </div>

    </div>
</div>
    
@endsection