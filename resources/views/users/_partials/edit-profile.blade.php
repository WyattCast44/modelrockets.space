@modal(['name' => 'update-profile'])

    <h1 class="text-gray-700 font-semibold text-2xl mb-5 uppercase">Update Your Profile</h1>

    <form action="{{ route('users.update', auth()->user()) }}" method="post">

        @csrf
        @method('PATCH')

        <div class="form-group">

            <label for="email" class="text-gray-600">Email Address</label>
            <input type="email" class="form-control" autocomplete="email" name="email" value="{{ auth()->user()->email }}" required />

            @error('email')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror
            
        </div>

        <div class="form-group">
            
            <label for="Username" class="text-gray-600">Username</label>
            <input type="text" class="form-control" autocomplete="false" name="username" value="{{ auth()->user()->username }}" required />

            @error('username')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

        <div class="form-group">
            
            <label for="username" class="text-gray-600">Tagline</label>
            <input type="text" class="form-control" autocomplete="false" name="tagline" value="{{ auth()->user()->profile->tagline }}" />

            @error('tagline')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

        <div class="form-group">
            
            <label for="signature" class="text-gray-600">Signature</label>
            <textarea class="form-control" autocomplete="false" name="signature">{{ auth()->user()->profile->signature }}</textarea>

            @error('signature')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="public" id="public" {{ (auth()->user()->public) ? 'checked' : '' }}>
            <label class="form-check-label" for="public">Public Profile</label>
        </div>

        <div class="form-group mb-0 flex items-center justify-end">
            
            <a href="#" class="btn btn-link mr-3">Cancel</a>
            <button type="submit" class="btn btn-outline-primary">Update</button>

        </div>
        
    </form>

@endmodal
