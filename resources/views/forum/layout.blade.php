@extends('layouts.app')

@section('content')

    <header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000;">
        
        <div class="mx-auto" style="width:600px;max:width:90%">
            <input type="text" placeholder="Search the forums..." class="form-control">    
        </div>    

    </header>

    @yield('forum-page')
    
@endsection