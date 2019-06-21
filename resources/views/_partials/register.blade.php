@modal(['name' => 'register'])

    <h2 class="text-2xl font-semibold mb-4 uppercase">Register</h2>

    <form method="POST" action="{{ route('register') }}" data-controller="register">

        @csrf

        <!-- Username -->
        <div class="form-group">

            <label for="username">{{ __('Username') }}</label>

            <div>
                <input data-action="keyup->register#validateUsername" data-target="register.username" type="text" class="form-control mt-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="false" spellcheck="false" autofocus>
                <small data-target="register.usernameError" class="hidden text-red-400"></small>
            </div>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Email -->
        <div class="form-group">

            <label for="email">{{ __('E-Mail Address') }}</label>

            <div>
                <input data-action="keyup->register#validateEmail" data-target="register.email" id="email" type="email" class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <small data-target="register.emailError" class="hidden text-red-400"></small>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password -->
        <div class="form-group">

            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password Confirm -->
        <div class="form-group">

            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="mt-2 form-control" name="password_confirmation" required autocomplete="new-password">

        </div>
        
        <!-- Submit -->
        <div class="form-group mb-0 flex items-center justify-end">
            
            <a href="#login" class="btn btn-link mr-2" data-turbolinks="false">Login</a>
            
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

        </div>

    </form>

@endmodal