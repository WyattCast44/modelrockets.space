@extends('layouts.app')

@section('page-title', 'Roadmap') 

@section('content')

<header class="flex flex-col py-12 mb-8 bg-gray-200 border-b border-gray-300 border-solid">
    <div class="container">
        <h1 class="mb-2 text-3xl font-semibold">Roadmap</h1>
        <p class="text-gray-700">
            I want this community to have a say in how this platform grows, for this reason I 
            have made the product roadmap public. You can see what I am working on, and vote for 
            what feature(s) I should work on next! BTW this whole site is open source, check it 
            out <a href="https://github.com/WyattCast44/modelrockets.space" target="_blank" data-turbolinks="false">here</a>!
        </p>    
    </div>
</header>

<livewire:features.index>

@endsection