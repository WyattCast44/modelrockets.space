@extends('layouts.app')

@section('content')

<header class="flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Terms & Conditions</h1>
        <p class="text-gray-700 text-lg">
            The classic terms & conditions
        </p>
    </div>
</header>

<div class="container mx-auto pt-8 pb-16">

    <div class="markdown-body">
        {!! markdown('pages/_content/terms') !!}
    </div>

</div>

@endsection