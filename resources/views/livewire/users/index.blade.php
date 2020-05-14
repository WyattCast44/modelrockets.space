<div class="container relative" style="top: -50px">

    <div class="overflow-hidden bg-gray-200 border border-gray-400 rounded-lg shadow-xl">
        
        <div class="px-4 py-5 bg-white border-b border-gray-400 sm:px-6">
            <input type="text" wire:model="search" class="m-0 form-control focus:shadowhover:shadow" placeholder="Search members..." autofocus>
        </div>
        
        <div class="px-4 py-5 bg-white sm:p-6">

            <div class="px-2">
                <div class="flex flex-wrap -mx-2">
                
                    @foreach($users as $user)
                    
                        <div class="justify-center px-3 py-4 rounded w-100 md:w-1/3 md:justify-start hover:bg-gray-200">
                            <div class="flex items-center h-12">
            
                                <img src="{{  $user->gravatar }}" alt="{{ $user->username }}" class="w-10 mr-3 rounded-full">
            
                                <div>
                                    <a href="{{ route('users.show', $user) }}" class="block">
                                        {{ '@' . $user->username }}
                                    </a>
                                    <p class="text-sm italic text-gray-600">Joined {{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>   
            
                    @endforeach
                    
                </div>
            </div>
    
        </div>

        {{ $users->links('livewire.partials.pagination') }}

    </div>
    
</div>