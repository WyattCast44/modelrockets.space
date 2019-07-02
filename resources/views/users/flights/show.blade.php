@extends('users.layout')

@section('user-content')

    <div class="container">
        
        <h2 class="text-2xl font-semibold border-b border-solid mb-4 pb-2">{{ $flight->rocket }}</h2>

        <section class="my-6">
            <p class="text-gray-600 text-sm">Date Flown: {{ $flight->date->diffForHumans() }} | Posted: {{ $flight->created_at->diffForHumans() }}</p>
        </section>

        <main>
            <div class="mb-5">
                <h3 class="uppercase font-semibold mb-3 text-gray-600">Description</h3>
                <div>{!! $flight->description !!}</div>
            </div>

            <div class="mb-5">
                <h3 class="uppercase font-semibold mb-3 text-gray-600">Motors</h3>
                <p>{{ $flight->motors }}</p>
            </div>

            <div class="mb-5">
                <h3 class="uppercase font-semibold mb-3 text-gray-600">Altitude</h3>
                <p>{{ $flight->altitude }}</p>
            </div>

            <div class="mb-5">
                <h3 class="uppercase font-semibold mb-3 text-gray-600">Attachments</h3>
            </div>
        </main>

    </div>

@endsection