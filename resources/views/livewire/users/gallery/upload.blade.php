<div class="mb-10" x-data="{ show: false }">
    <button x-on:click="show = !show" class="btn btn-outline-primary">Upload Pictures</button>

    <div x-show="show" class="p-5 mt-6 bg-gray-100 border rounded">

        <form wire:submit.prevent="save">
            <input type="file" wire:model="photos" multiple>
        
            @error('photos.*') <span class="error">{{ $message }}</span> @enderror
        
            <button type="submit" class="btn btn-outline-primary btn-sm">Upload Photos</button>
        </form>

        @if ($photos)

            <div class="grid grid-cols-5 gap-4 mt-5">
                
                @foreach ($photos as $photo)
                
                    <div class="h-40 bg-gray-100 bg-center bg-no-repeat bg-cover rounded" style="background-image: url({{ $photo->temporaryUrl() }})">
                    </div>
        
                @endforeach
    
            </div>
            
        @endif


    </div>

</div>