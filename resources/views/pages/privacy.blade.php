@extends('layouts.app')

@section('content')

<header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Privacy Policy</h1>
        <p class="text-gray-700 text-lg">
            Classic privacy policy
        </p>
    </div>
</header>

<div class="container mx-auto pt-8 pb-16">

    <!-- Actions -->
    <div class="flex items-center mb-4 sm:mb-6 md:mb-8 justify-center md:justify-start print:hidden">

        <!-- Print -->
        <div data-controller="print">
            <a href="#" class="btn btn-outline-primary mr-2 btn-sm" data-action="print#handle" data-turbolinks="false">🖨️ Print</a>
        </div>
        
        <!-- Share -->
        <a href="#share" class="btn btn-outline-primary btn-sm" data-turbolinks="false">📤 Share</a>

    </div>

    <!-- Meta -->
    <p class="text-sm text-gray-500 my-1 md:mb-8 text-center md:text-left">
        Last updated July 31st 2019
    </p>

    <div class="markdown-body">
        {!! markdown('pages/_content/privacy') !!}
    </div>

</div>

@include('_partials.share')

@endsection