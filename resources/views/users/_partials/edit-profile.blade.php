@modal(['name' => 'update-profile'])

    <form action="{{ route('users.update', auth()->user()) }}" method="post">

        <div class="form-group">

            <label for="email">Email Address</label>
            <input type="email" class="form-control" autocomplete="email" value="{{ auth()->user()->email }}" required />

            @error('email')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror
            
        </div>

        <div class="form-group">
            
            <label for="Username">Username</label>
            <input type="text" class="form-control" autocomplete="false" value="{{ auth()->user()->username }}" required />

            @error('username')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

        <div class="form-group">
            
            <label for="Username">Tagline</label>
            <input type="text" class="form-control" autocomplete="false" value="{{ auth()->user()->profile->tagline }}" />

            @error('tagline')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>
        
    </form>

@endmodal
