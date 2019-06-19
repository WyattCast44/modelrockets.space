@extends('layouts.app')

@section('content')

    <header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

        <div class="container flex justify-between items-center">
            
            <h2>The Forum</h2>
            
        </div>
    
    </header>

    @yield('forum-page')
    
@endsection