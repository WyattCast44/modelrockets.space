@extends('layouts.app')

@section('content')

    <header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
        <div class="container">
            <h1 class="font-semibold text-3xl mb-5">The Forum</h1>

            <input type="text" name="filter" placeholder="Search..." class="px-3 py-2 border-solid border border-gray-300 rounded focus:outline-none focus:shadow-outline" />
        </div>
    </header>

    @yield('forum-page')
    
@endsection