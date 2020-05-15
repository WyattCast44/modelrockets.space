@modal(['name' => 'register'])

    <h2 class="mb-4 text-2xl font-semibold uppercase">Register</h2>

    <form method="POST" action="{{ route('register') }}" data-controller="register">

        @csrf

        <!-- Username -->
        <div class="form-group">

            <label for="username">Username</label>

            <div data-controller="input-validator" data-input-validator-url="{{ route('api.validators.username') }}">
                <input  type="text" data-target="input-validator.source" data-action="keyup->input-validator#handle"  class="form-control mt-2 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  required autocomplete="false" spellcheck="false" autofocus>
                <small data-target="input-validator.error" class="hidden text-red-400"></small>
            </div>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Email -->
        <div class="form-group">

            <label for="email">E-Mail Address</label>

            <div data-controller="input-validator" data-input-validator-url="{{ route('api.validators.email') }}">
                <input  type="email" data-target="input-validator.source" data-action="keyup->input-validator#handle"  class="form-control mt-2 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required autocomplete="false" spellcheck="false">
                <small data-target="input-validator.error" class="hidden text-red-400"></small>
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

            <input type="password" class="form-control mt-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <!-- Password Confirm -->
        <div class="form-group">

            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input type="password" class="mt-2 form-control" name="password_confirmation" required autocomplete="new-password">

        </div>
        
        <!-- Submit -->
        <div class="flex items-center justify-end mb-0 form-group">
            
            <a href="{{ route('login') }}" class="mr-2 btn btn-link">
                Login
            </a>
            
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>

        </div>

    </form>

@endmodal