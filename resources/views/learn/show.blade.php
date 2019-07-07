@extends('layouts.app')

@section('content')

<div class="h-screen">

    <section class="bg-gray-800 flex flex-col md:flex-row justify-center items-top">

        <div class="flex-1 flex justify-center items-center vid-container p-4">
            <iframe src="https://www.youtube.com/embed/BGuJnXVa3rg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    
        <div class="w-1/5 bg-gray-900">
            <ul class="list-unstyled">
                <li class="p-4">Next</li>
                <li class="p-4">First</li>
            </ul>
        </div>
    
    </section>

</div>


<style>
    .vid-container > iframe {
        width: 100%;
        min-height: 575px;
    }
</style>

@endsection