@extends('layouts.app')

@section('page-title', 'Roadmap') 

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Roadmap</h1>
        <p class="text-gray-700">
            I want this community to have a say in how this platform grows, for this reason I 
            have made the product roadmap public. You can see what I am working on, and vote for 
            what feature(s) I should work on next!
        </p>    
    </div>
</header>

<div class="container mb-16">
    
    <!-- Open -->
    <h1 class="font-semibold my-3 text-xl text-gray-700 border-b border-solid border-gray-400 pb-1">
        Open/Pending Features
        <span class="text-sm">(Key: 👨‍💻 = In-Progress, 🤔 = Pending)</span>
    </h1>
    <ul class="mb-12 mt-3">
        @forelse ($openFeatures as $feature)
            <li class="flex p-3 hover:bg-gray-200 rounded">
                <div class="flex items-center text-2xl justify-center mr-3">
                    {{ ($feature->status == 'in-progress') ? '👨‍💻' : '🤔'  }}
                </div>
                <div>
                    <h2 class="font-semibold text-md">{{ $feature->name }}</h2>
                    <p class="text-sm">{{ $feature->body }}</p>
                    <div class="flex mt-1 items-center" data-controller="feature">
                        <p class="text-sm mr-1">
                            Upvotes: 
                            <span 
                                class="px-3 border border-solid border-green-300 rounded-full text-green-600 bg-green-100 leading-none mx-1 text-center tracking-tight" 
                                data-target="feature.count">
                                {{ $feature->upvotes }}</span>
                        </p>
                        <form action="{{ route('features.upvote', $feature) }}" class="flex" method="post" data-target="feature.form" data-action="submit->feature#upvote">
                            @csrf
                            <button type="submit" class="btn btn-link inline-block text-sm p-0">Upvote</button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>

    <!-- Closed -->
    <h1 class="font-semibold my-3 text-xl text-gray-700 border-b border-solid border-gray-400 pb-1">Complete/Rejected Features</h1>
    <ul>
        @forelse ($closedFeatures as $feature)
            <li>
                <div>
                    <h2 class="font-semibold text-lg">{{ $feature->name }}</h2>
                    <p>{{ $feature->body }}</p>
                </div>
            </li>
        @empty
            <li>
                Nothing to see here...    
            </li>
        @endforelse
    </ul>

</div>

@endsection