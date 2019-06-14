@modal(['name' => 'update-profile'])

    <form action="{{ route('users.update', $user) }}" method="post" style="max-width:600px">

        <div class="form-group">

            <label for="email">Email Address</label>
            <input type="email" class="form-control" required autocomplete="email" value="{{ $user->email }}">

            @error('email')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

        <div class="form-group">

            <label for="Username">Username</label>
            <input type="text" class="form-control" required autocomplete="false" value="{{ $user->username }}">

            @error('username')
                <strong class="text-red-300">{{ $message }}</strong>
            @enderror

        </div>

    </form>

@endmodal