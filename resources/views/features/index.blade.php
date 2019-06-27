@extends('layouts.app')

@section('page-title', 'Roadmap') 

@section('content')

<header class="mb-8 flex flex-col bg-gray-200 border-b border-solid border-gray-300 py-12">
    <div class="container">
        <h1 class="font-semibold text-3xl mb-2">Roadmap</h1>
        <p class="text-gray-700">
            I want this community to have a say in how this platform grows, for this reason I 
            have made the product roadmap public. You can see what I am working on, and vote for 
            what feature(s) I should work on next! BTW this whole site is open source, check it 
            out <a href="https://github.com/WyattCast44/modelrockets.space" target="_blank" data-turbolinks="false">here</a>!
        </p>    
    </div>
</header>

<div class="container mb-16">
    
    <!-- Open -->
    <h1 class="font-semibold my-3 text-xl text-gray-700 border-b border-solid border-gray-400 pb-1">
        Open/Pending Features
        <span class="text-sm">(Key: 👨‍💻 = In-Progress, 💡 = Idea/Not Started)</span>
    </h1>
    
    <ul class="mb-12 mt-3">

        @forelse ($openFeatures as $feature)
            <li class="flex p-3 hover:bg-gray-200 rounded">
                <div class="flex items-center text-2xl justify-center mr-3">
                    {{ ($feature->status == 'in-progress') ? '👨‍💻' : '💡'  }}
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
                                {{ $feature->votes_count }}</span>
                        </p>

                        @auth

                            @if(!auth()->user()->votes->contains($feature))
                                <form action="{{ route('features.upvote', $feature) }}" class="flex" method="post" data-target="feature.form" data-action="submit->feature#upvote">
                                    @csrf
                                    <button type="submit" class="btn btn-link inline-block text-sm p-0">Upvote</button>
                                </form>
                            @endif    

                        @endauth
                        
                        @guest
                            <a href="#login" class="text-sm" data-turbolinks="false">Login to vote</a>
                        @endguest
                        
                    </div>
                </div>
            </li>
        @empty
        @endforelse
    </ul>

    <!-- Closed -->
    <h1 class="font-semibold my-3 text-xl text-gray-700 border-b border-solid border-gray-400 pb-1">
            Complete/Rejected Features/Ideas
            <span class="text-sm">(Key: ✅ = Complete, 💀 = Rejected)</span>
        </h1>
    <ul>
        @forelse ($closedFeatures as $feature)
            <li class="flex p-3 hover:bg-gray-200 rounded">
                <div class="flex items-center text-2xl justify-center mr-3">
                    {{ ($feature->status == 'complete') ? '✅' : '💀'  }}
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
                                {{ $feature->votes_count }}</span>
                        </p>
                        
                    </div>
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