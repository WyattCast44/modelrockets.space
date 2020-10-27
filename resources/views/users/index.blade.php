<div>

    @section('page-title', 'Public Users')

    <header class="flex flex-col pt-12 pb-24 bg-gray-200 border-b border-gray-300 border-solid">
        <div class="container">

            <h1 class="mb-3 text-4xl text-center">All Public Members</h1>

            <p class="text-center text-gray-600">
                Meet new friends, discover old pals, and stay connected to your fellow rocketers!
            </p>

        </div>
    </header>

    <div class="container relative" style="top: -50px">

        <div class="overflow-hidden bg-gray-200 border border-gray-400 rounded-lg">
            
            <div class="px-4 py-5 bg-white border-b border-gray-400 sm:px-6">
                <input type="text" wire:model="search" class="m-0 form-control" placeholder="Search members...">
            </div>
            
            <div class="px-4 py-5 bg-white sm:p-6">

                <div class="px-2">
                    <div class="flex flex-wrap -mx-2">
                    
                        @foreach($users as $user)
                        
                            <div class="justify-center px-3 py-4 rounded w-100 md:w-1/3 md:justify-start hover:bg-gray-200">
                                <a href="{{ route('users.show', $user) }}" class="block hover:no-underline">
                                    
                                    <div class="flex items-center h-12">
                
                                        <img src="{{  $user->gravatar }}" alt="{{ $user->username }}" class="w-10 mr-3 rounded-full">
                
                                        <div>
                                            {{ '@' . $user->username }}
                                            <p class="text-sm italic text-gray-600">Joined {{ $user->created_at->diffForHumans() }}</p>
                                        </div>
                                        
                                    </div>

                                </a>
                            </div>   
                
                        @endforeach
                        
                    </div>
                </div>
        
            </div>

            {{ $users->links('livewire.partials.pagination') }}

        </div>
        
    </div>

</div>