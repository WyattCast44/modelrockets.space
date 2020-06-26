@extends('layouts.app')

@section('page-title', 'Terms & Conditions')

@section('content')

<header class="flex flex-col py-12 bg-gray-200 border-b border-gray-300 border-solid">
    <div class="container">
        <h1 class="mb-2 text-3xl font-semibold">Terms & Conditions</h1>
        <p class="text-lg text-gray-700">
            The classic terms & conditions
        </p>
    </div>
</header>

<div class="container pt-8 pb-16 mx-auto">

    <!-- Actions -->
    <div class="flex items-center justify-center mb-4 sm:mb-6 md:mb-8 md:justify-start print:hidden">

        <!-- Print -->
        <div x-data>
            <button class="mr-2 btn btn-outline-primary btn-sm" data-turbolinks="false" x-on:click="window.print()">🖨️ Print</button>
        </div>
        
        <!-- Share -->
        <a href="#share" class="btn btn-outline-primary btn-sm" data-turbolinks="false">📤 Share</a>

        <x-share title="Terms and Conditions"></x-share>

        <a href="https://github.com/WyattCast44/modelrockets.space/blob/master/resources/views/pages/_content/terms.md" target="_blank" class="ml-2 btn btn-outline-primary btn-sm" data-turbolinks="false">📝 Edit on GitHub</a>

    </div>

    <!-- Meta -->
    <p class="my-1 text-sm text-center text-gray-500 md:mb-8 md:text-left">
        Last updated July 31st 2019
    </p>

    <div class="markdown-body">
        {!! markdown('pages/_content/terms') !!}
    </div>

</div>

@endsection