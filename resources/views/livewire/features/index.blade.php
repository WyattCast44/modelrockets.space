<div>

    @section('page-title', 'Roadmap') 

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
    
    <div class="container mb-16">
        
        <!-- Open -->
        <h1 class="pb-1 my-3 text-xl font-semibold text-gray-700 border-b border-gray-400 border-solid">
            Open/Pending Features
            <span class="text-sm">(Key: 👨‍💻 = In-Progress, 💡 = Idea/Not Started)</span>
        </h1>
        
        <ul class="mt-3 mb-12">
    
            @forelse ($openFeatures as $feature)
    
                <li class="flex p-3 rounded hover:bg-gray-200">
    
                    <!-- Icons -->
                    <div class="flex items-center justify-center mr-3 text-2xl">
                        {{ ($feature->status == 'in-progress') ? '👨‍💻' : '💡'  }}
                    </div>
    
                    <!-- Details -->
                    <div>
    
                        <h2 class="font-semibold text-md">{{ $feature->name }}</h2>
                        <p class="text-sm">{{ $feature->body }}</p>
    
                        <!-- Voting -->
                        <div class="flex items-center mt-1">
    
                            <!-- Vote Count -->
                            <p class="mr-1 text-sm">
                                Upvotes: 
                                <span 
                                    class="px-3 mx-1 leading-none tracking-tight text-center text-green-600 bg-green-100 border border-green-300 border-solid rounded-full">
                                    {{ $feature->votes_count }}</span>
                            </p>
    
                            <!-- Vote Button -->
                            @auth
    
                                @if(!$userVotes->contains($feature->id))
                                    <button wire:click="upvote({{ $feature->id }})" class="inline-block p-0 text-sm btn btn-link">Upvote</button>
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
        <h1 class="pb-1 my-3 text-xl font-semibold text-gray-700 border-b border-gray-400 border-solid">
                Complete/Rejected Features/Ideas
                <span class="text-sm">(Key: ✅ = Complete, 💀 = Rejected)</span>
            </h1>
        <ul>
            @forelse ($closedFeatures as $feature)
                <li class="flex p-3 rounded hover:bg-gray-200">
                    <div class="flex items-center justify-center mr-3 text-2xl">
                        {{ ($feature->status == 'complete') ? '✅' : '💀'  }}
                    </div>
                    <div>
                        <h2 class="font-semibold text-md">{{ $feature->name }}</h2>
                        <p class="text-sm">{{ $feature->body }}</p>
                        <div class="flex items-center mt-1" >
                            <p class="mr-1 text-sm">
                                Upvotes: 
                                <span 
                                    class="px-3 mx-1 leading-none tracking-tight text-center text-green-600 bg-green-100 border border-green-300 border-solid rounded-full" >
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
    
        <!-- TODO: Add livewire tests to replace old tests and remove old routes, stimulus controllers, and tests -->
    
    </div>

</div>